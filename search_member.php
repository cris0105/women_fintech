<?php
include_once "includes/header.php";
?>

<div class="form-container">
    <h2 class="text-center">Cautare Membrii</h2>
    <form method="GET" action="search_results.php">
        <div class="form-group">
            <label>Cautati după Nume, E-mail sau Companie</label>
            <input type="text" name="query" class="form-control" placeholder="Introduceți numele, email-ul sau compania" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Cautare</button>
    </form>
</div>

<?php
include_once "includes/footer.php";
?>
