<?php
include_once "config/database.php";
include_once "includes/header.php";

$query = $_GET['query'] ?? '';

$database = new Database();
$db = $database->getConnection();

$sql = "SELECT * FROM members WHERE 
        first_name LIKE ? OR 
        last_name LIKE ? OR 
        email LIKE ? OR 
        company LIKE ?";
$stmt = $db->prepare($sql);
$stmt->execute([
    '%' . $query . '%', 
    '%' . $query . '%', 
    '%' . $query . '%', 
    '%' . $query . '%'
]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <h2>Rezultatele Cautarii</h2>
    <?php if (count($results) > 0): ?>
        <div class="row">
            <?php foreach ($results as $member): ?>
                <div class="col-md-4">
                    <div class="card member-card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($member['first_name'] . ' ' . $member['last_name']); ?></h5>
                            <p class="card-text">
                                <strong>E-mail:</strong> <?php echo htmlspecialchars($member['email']); ?><br>
                                <strong>Companie:</strong> <?php echo htmlspecialchars($member['company']); ?><br>
                                <strong>Profesie:</strong> <?php echo htmlspecialchars($member['profession']); ?>
                            </p>
                            <a href="edit_member.php?id=<?php echo $member['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete_member.php?id=<?php echo $member['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Sigur doriti sa stergeti acest membru?')">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center">Nu s-au gasit membrii pentru cautarea dvs.</p>
    <?php endif; ?>
</div>

<?php
include_once "includes/footer.php";
?>
