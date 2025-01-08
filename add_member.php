<?php
include_once "config/database.php";
include_once "includes/header.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();

    $profile_photo = null;

    // Verifică dacă o fotografie a fost încărcată
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = strtolower(pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            $target_dir = "uploads/profile_pictures/";

            // Creează directorul dacă nu există
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $file_name = basename($_FILES['profile_photo']['name']);
            $target_file = $target_dir . time() . "_" . $file_name;

            // Mută fișierul în directorul "uploads/profile_pictures"
            if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $target_file)) {
                $profile_photo = $target_file;
            } else {
                echo "Eroare la mutarea fișierului.";
            }
        } else {
            echo "Tipul de fișier nu este acceptat. Sunt permise doar: jpg, jpeg, png, gif.";
        }
    }

    // Inserare în baza de date
    $query = "INSERT INTO members
        (first_name, last_name, email, profession, company, expertise, linkedin_profile, profile_photo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($query);

    $stmt->execute([
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['profession'],
        $_POST['company'],
        $_POST['expertise'],
        $_POST['linkedin_profile'],
        $profile_photo
    ]);

    header("Location: members.php");
    exit();
}
?>
<div class="form-container">
 <h2>Adauga Membru Nou</h2>
 <form method="POST" enctype="multipart/form-data">

 <div class="form-group">
    <label>Fotografie de Profil</label>
    <input type="file" name="profile_photo" class="form-control">
</div>

 <div class="form-group">
 <label>Prenume</label>
 <input type="text" name="first_name" class="form-control" required>
 </div>

 <div class="form-group">
 <label>Nume</label>
 <input type="text" name="last_name" class="form-control" required>
 </div>

 <div class="form-group">
 <label>E-mail</label>
 <input type="email" name="email" class="form-control" required>
 </div>

 <div class="form-group">
 <label>Profesie</label>
 <input type="text" name="profession" class="form-control">
 </div>

 <div class="form-group">
 <label>Companie</label>
 <input type="text" name="company" class="form-control">
 </div>

 <div class="form-group">
 <label>Experienta</label>
 <textarea name="expertise" class="form-control"></textarea>
 </div>

 <div class="form-group">
 <label>Profil LinkedIn</label>
 <input type="url" name="linkedin_profile" class="form-control">
 </div>

 <button type="submit" class="btn btn-primary">Add Member</button>
 </form>
</div>
<?php
include_once "includes/footer.php";
?>
