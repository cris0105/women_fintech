<?php
ob_start();
include_once "config/database.php";
include_once "includes/header.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Error: Missing or invalid member ID.');
}

$id = intval($_GET['id']); 

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM members WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$member) {
    die('Error: Member not found.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $profile_photo_path = $member['profile_photo']; 

    if (isset($_POST['delete_photo'])) {
        if (!empty($member['profile_photo']) && file_exists($member['profile_photo'])) {
            unlink($member['profile_photo']); 
        }
        $profile_photo_path = "uploads/profile_pictures/default-profile.png"; 
    } elseif (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {

        $upload_dir = "uploads/profile_pictures/";
        $file_tmp = $_FILES['profile_photo']['tmp_name'];
        $file_name = basename($_FILES['profile_photo']['name']);
        $target_file = $upload_dir . time() . "_" . $file_name;

        $file_type = mime_content_type($file_tmp);
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($file_type, $allowed_types)) {
            if (!empty($member['profile_photo']) && file_exists($member['profile_photo'])) {
                unlink($member['profile_photo']); 
            }

            if (move_uploaded_file($file_tmp, $target_file)) {
                $profile_photo_path = $target_file;
            } else {
                echo "<div class='alert alert-danger'>Eroare la salvarea fișierului. Vă rugăm să încercați din nou.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Tip de fișier invalid. Doar JPEG, PNG sau GIF sunt permise.</div>";
        }
    }

    $query = "UPDATE members SET 
                first_name = ?, 
                last_name = ?, 
                email = ?, 
                profession = ?, 
                company = ?, 
                linkedin_profile = ?, 
                profile_photo = ? 
              WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['profession'],
        $_POST['company'],
        $_POST['linkedin_profile'],
        $profile_photo_path,
        $id
    ]);

    header("Location: members.php");
    exit();
}
?>

<div class="form-container">
    <h2 class="text-center">Editare Membru</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Fotografie de profil</label>
            <?php if (!empty($member['profile_photo'])): ?>
                <p>Fotografie curentă:</p>
                <img src="<?php echo htmlspecialchars($member['profile_photo']); ?>" alt="Profile Photo" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                <button type="submit" name="delete_photo" class="btn btn-danger btn-sm mt-2">Șterge Fotografia</button>
            <?php else: ?>
                <p>Fotografia curentă: <img src="uploads/profile_pictures/default-profile.png" alt="Default Profile Photo" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;"></p>
            <?php endif; ?>
            <input type="file" name="profile_photo" class="form-control mt-2">
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
            <label>Profil LinkedIn</label>
            <input type="url" name="linkedin_profile" class="form-control" value="<?php echo htmlspecialchars($member['linkedin_profile']); ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvează Modificările</button>
    </form>
</div>

<?php
include_once "includes/footer.php";
ob_end_flush();
?>