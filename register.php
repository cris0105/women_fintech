<?php
include_once "config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    $role = htmlspecialchars($_POST['role']);

    $query = "INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    if ($stmt->execute([$first_name, $last_name, $email, $password, $role])) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Eroare la înregistrare!";
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Women in FinTech</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center text-primary mb-4">Înregistrare</h3>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="first_name">Prenume:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Introduceți prenumele" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nume:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Introduceți numele" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Introduceți adresa de email" required>
            </div>
            <div class="form-group">
                <label for="password">Parolă:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Introduceți parola" required>
            </div>
            <div class="form-group">
                <label for="role">Rol:</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="member">Membru</option>
                    <option value="mentor">Mentor</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block">Înregistrează-te</button>
            </div>
            <div class="text-center mt-3">
                <p>Ai deja un cont? <a href="login.php" class="text-primary">Autentificare</a></p>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
