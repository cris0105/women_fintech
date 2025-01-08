<?php
include_once "config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing parolă
    $role = htmlspecialchars($_POST['role']);

    $query = "INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    if ($stmt->execute([$first_name, $last_name, $email, $password, $role])) {
        echo "Înregistrare reușită!";
        header("Location: login.php");
        exit();
    } else {
        echo "Eroare la înregistrare!";
    }
}
?>

<form action="register.php" method="POST">
    <label for="first_name">Prenume:</label>
    <input type="text" name="first_name" required>

    <label for="last_name">Nume:</label>
    <input type="text" name="last_name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Parolă:</label>
    <input type="password" name="password" required>

    <label for="role">Rol:</label>
    <select name="role" required>
        <option value="member">Membru</option>
        <option value="mentor">Mentor</option>
        <option value="admin">Admin</option>
    </select>

    <button type="submit">Înregistrează-te</button>
</form>
