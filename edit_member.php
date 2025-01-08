<?php
include_once "config/database.php";
include_once "includes/header.php";

// Verificăm dacă parametrul 'id' este setat
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Error: Missing or invalid member ID.');
}

$id = intval($_GET['id']); // Convertim în număr întreg pentru siguranță

// Conectare la baza de date
$database = new Database();
$db = $database->getConnection();

// Obține membrul pe baza ID-ului
$query = "SELECT * FROM members WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificăm dacă membrul există
if (!$member) {
    die('Error: Member not found.');
}

// Procesăm actualizarea datelor membrului
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = "UPDATE members SET 
                first_name = ?, 
                last_name = ?, 
                email = ?, 
                profession = ?, 
                company = ?, 
                linkedin_profile = ? 
              WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['profession'],
        $_POST['company'],
        $_POST['linkedin_profile'],
        $id
    ]);

    // Redirecționăm utilizatorul după salvarea modificărilor
    header("Location: members.php");
    exit();
}
?>

<div class="form-container">
    <h2 class="text-center">Editare Membru</h2>
    <form method="POST">
        <div class="form-group">
            <label>Fotografie de profil</label>
            <input type="file" name="profile_photo" class="form-control">
        </div>
        <div class="form-group">
            <label>Prenume</label>
            <input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($member['first_name']); ?>" required>
        </div>
        <div class="form-group">
            <label>Nume</label>
            <input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($member['last_name']); ?>" required>
        </div>
        <div class="form-group">
            <label>E-mail</label>
            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($member['email']); ?>" required>
        </div>
        <div class="form-group">
            <label>Profesie</label>
            <input type="text" name="profession" class="form-control" value="<?php echo htmlspecialchars($member['profession']); ?>">
        </div>
        <div class="form-group">
            <label>Companie</label>
            <input type="text" name="company" class="form-control" value="<?php echo htmlspecialchars($member['company']); ?>">
        </div>
        <div class="form-group">
            <label>Experienta</label>
            <textarea name="expertise" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Profil LinkedIn</label>
            <input type="url" name="linkedin_profile" class="form-control" value="<?php echo htmlspecialchars($member['linkedin_profile']); ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvează Modificările</button>
    </form>
</div>

<?php
include_once "includes/footer.php";
?>

