<?php
session_start();
include_once "config/database.php";

$login_success = false; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['logged_in'] = true;
        $_SESSION['user_role'] = $user['role']; 
        $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name']; 

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
    <title>Login - Women in FinTech</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center text-primary mb-4">Autentificare</h3>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Introdu adresa de email" required>
            </div>
            <div class="form-group">
                <label for="password">Parolă:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Introdu parola" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block">Autentificare</button>
            </div>
            <div class="text-center mt-3">
                <p>Nu ai un cont? <a href="register.php" class="text-primary">Înregistrează-te</a></p>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
