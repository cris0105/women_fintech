<?php
include_once "config/database.php";
include_once "includes/header.php";

$database = new Database();
$db = $database->getConnection();

$sort_column = 'created_at'; 
$sort_order = 'DESC'; 

if (isset($_GET['sort']) && in_array($_GET['sort'], ['first_name', 'last_name', 'created_at'])) {
    $sort_column = $_GET['sort'];
}
if (isset($_GET['order']) && in_array(strtoupper($_GET['order']), ['ASC', 'DESC'])) {
    $sort_order = strtoupper($_GET['order']);
}

$members_per_page = 8;
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $members_per_page;

$query = "SELECT * FROM members";
$query_conditions = [];

if (!empty($_GET['profession'])) {
    $query_conditions[] = "profession = :profession";
}

if ($query_conditions) {
    $query .= " WHERE " . implode(" AND ", $query_conditions);
}

$query .= " ORDER BY $sort_column $sort_order LIMIT :limit OFFSET :offset";

$stmt = $db->prepare($query);
if (!empty($_GET['profession'])) {
    $stmt->bindParam(':profession', $_GET['profession']);
}
$stmt->bindParam(':limit', $members_per_page, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$count_query = "SELECT COUNT(*) as total FROM members";
if (!empty($_GET['profession'])) {
    $count_query .= " WHERE profession = :profession";
}
$count_stmt = $db->prepare($count_query);
if (!empty($_GET['profession'])) {
    $count_stmt->bindParam(':profession', $_GET['profession']);
}
$count_stmt->execute();
$total_members = $count_stmt->fetch(PDO::FETCH_ASSOC)['total'];
$total_pages = ceil($total_members / $members_per_page);

$profession_query = "SELECT DISTINCT profession FROM members ORDER BY profession ASC";
$profession_stmt = $db->prepare($profession_query);
$profession_stmt->execute();
$professions = $profession_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Membrii</h2>

<form method="GET" class="mb-4">
    <div class="row text-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-center align-items-center">
                <div class="px-2">
                    <label for="sort" class="form-label">Sorteaza dupa:</label>
                    <select name="sort" id="sort" class="form-select">
                        <option value="last_name" <?php echo ($sort_column == 'last_name') ? 'selected' : ''; ?>>Nume</option>
                        <option value="created_at" <?php echo ($sort_column == 'created_at') ? 'selected' : ''; ?>>Data inscrierii</option>
                    </select>
                </div>
                <div class="px-2">
                    <label for="order" class="form-label">Ordine:</label>
                    <select name="order" id="order" class="form-select">
                        <option value="ASC" <?php echo ($sort_order == 'ASC') ? 'selected' : ''; ?>>Crescator</option>
                        <option value="DESC" <?php echo ($sort_order == 'DESC') ? 'selected' : ''; ?>>Descrescator</option>
                    </select>
                </div>
                <div class="px-2">
                    <label for="profession" class="form-label">Filtreaza dupa profesie:</label>
                    <select name="profession" id="profession" class="form-select">
                        <option value="">Toate profesiile</option>
                        <?php foreach ($professions as $profession): ?>
                            <option value="<?php echo htmlspecialchars($profession['profession']); ?>" 
                                <?php echo (!empty($_GET['profession']) && $_GET['profession'] === $profession['profession']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($profession['profession']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Aplica</button>
        </div>
    </div>
</form>

<div class="row">
    <?php if ($stmt->rowCount() > 0): ?>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-6">
                <div class="card member-card p-3">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title"><?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?></h5>
                            <p class="card-text">
                                <strong>Profesie:</strong> <?php echo htmlspecialchars($row['profession']); ?><br>
                                <strong>Companie:</strong> <?php echo htmlspecialchars($row['company']); ?><br>
                                <strong>Data inscrierii:</strong> <?php echo htmlspecialchars(date("F j, Y", strtotime($row['created_at']))); ?>
                            </p>
                            <a href="edit_member.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Editeaza</a>
                            <a href="delete_member.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Sigur doriti sa stergeti acest membru?')">Sterge</a>
                        </div>
                        <div class="ml-3">
                            <?php if (!empty($row['profile_photo']) && file_exists($row['profile_photo'])): ?>
                                <img src="<?php echo htmlspecialchars($row['profile_photo']); ?>" alt="Profile Photo" class="img-thumbnail img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                            <?php else: ?>
                                <img src="uploads/default-profile.png" alt="Default Profile Photo" class="img-thumbnail img-fluid" style="width: 100px; height: 100px; object-fit: cover;">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Nu exista membrii pentru criteriile selectate.</p>
    <?php endif; ?>
</div>

<div class="pagination-container mt-4">
    <nav aria-label="Paginare membri">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo ($current_page <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $current_page - 1])); ?>" tabindex="-1">&laquo;</a>
            </li>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?php echo ($current_page >= $total_pages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $current_page + 1])); ?>">&raquo;</a>
            </li>
        </ul>
    </nav>
</div>

<?php
include_once "includes/footer.php";
?>
