<?php
session_start();
include_once "config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    // Caută utilizatorul în baza de date
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Setează sesiunea
        $_SESSION['logged_in'] = true;
        $_SESSION['user_role'] = $user['role']; // presupunând că rolul este extras din baza de date
        $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name']; // opțional        

        // Redirecționează pe baza rolului
        if ($user['role'] === 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($user['role'] === 'mentor') {
            header("Location: mentor_dashboard.php");
        } else {
            header("Location: member_dashboard.php");
        }
        exit();
    } else {
        $error = "Email sau parolă incorectă.";
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Autentificare</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="login.php" method="POST" class="mt-4">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Introdu adresa de email" required>
        </div>

        <div class="form-group">
            <label for="password">Parolă:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Introdu parola" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Autentificare</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
