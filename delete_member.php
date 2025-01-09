<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo "<script>
        alert('Doar administratorul poate șterge un membru.');
        window.location.href = 'members.php'; // Redirecționează la pagina membrii
    </script>";
    exit;
}

include_once "config/database.php";
$database = new Database();
$db = $database->getConnection();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM members WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Membrul a fost șters cu succes.');
            window.location.href = 'members.php';
        </script>";
    } else {
        echo "<script>
            alert('Eroare la ștergerea membrului.');
            window.location.href = 'members.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID membru invalid.');
        window.location.href = 'members.php';
    </script>";
}
