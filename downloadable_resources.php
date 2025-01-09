<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resurse Downloadabile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="<?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] == 'true' ? 'dark-mode' : ''; ?>">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Women in FinTech</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="members.php">Membrii</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="resourceHub" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Resource Hub
                    </a>
                    <div class="dropdown-menu" aria-labelledby="resourceHub">
                        <a class="dropdown-item" href="articles_resources.php">Articole și materiale</a>
                        <a class="dropdown-item" href="podcast_resources.php">Podcast-uri</a>
                        <a class="dropdown-item" href="downloadable_resources.php">Resurse downloadable</a>
                    </div>
                </li>
            </ul>
            <div class="ml-auto">
                <button class="btn btn-secondary" id="darkModeToggle">Dark Mode</button>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center">Resurse Downloadabile</h1>
    <p class="text-center">Descărcați PDF-urile disponibile despre femeile în tehnologie financiară.</p>
    <div class="list-group mt-4">

        <?php
        $directory = "uploads/downloadable_resources/"; 
        $files = glob($directory . "*.pdf"); 

        if (!empty($files)) {
            foreach ($files as $file) {
                $fileName = basename($file); 
                echo '<a href="' . $file . '" class="list-group-item list-group-item-action" download>' . $fileName . '</a>';
            }
        } else {
            echo '<p class="text-center text-danger">Momentan nu există fișiere disponibile pentru descărcare.</p>';
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script>
    document.getElementById('darkModeToggle').addEventListener('click', function() {
        const body = document.body;
        const isDarkMode = body.classList.toggle('dark-mode');
        document.cookie = "dark_mode=" + isDarkMode + "; path=/";
    });
</script>
</body>
</html>
