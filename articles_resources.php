<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articole și materiale</title>
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
    <h1 class="text-center">Articole și materiale</h1>
    <article class="mb-5">
        <h2>Femeile în Tehnologie: Construirea unui Viitor Incluziv</h2>
        <p><strong>Domeniul tehnologiei este unul dintre cele mai dinamice și inovatoare sectoare din lume.</strong></p>
        <p>Cu toate acestea, disparitățile de gen rămân o provocare majoră. Femeile continuă să fie subreprezentate în industria tehnologică, dar pașii în direcția egalității sunt vizibili și importanți...</p>
        <p><a href="article1.php" class="btn btn-primary">Citește mai mult</a></p>
    </article>

    <article class="mb-5">
        <h2>Importanța Rețelelor de Networking pentru Femeile din Tehnologie</h2>
        <p><strong>Rețelele de networking joacă un rol vital în succesul profesional.</strong></p>
        <p>Aceste rețele sunt un instrument esențial pentru femeile care doresc să își construiască o carieră solidă și să își lărgească orizonturile...</p>
        <p><a href="article2.php" class="btn btn-primary">Citește mai mult</a></p>
    </article>

    <article class="mb-5">
        <h2>Resurse Educaționale pentru Femeile din Tehnologie</h2>
        <p><strong>Educația este cheia pentru a reduce disparitățile de gen în tehnologie.</strong></p>
        <p>Există multe platforme și resurse gratuite care pot ajuta femeile să învețe programare...</p>
        <p><a href="article3.php" class="btn btn-primary">Citește mai mult</a></p>
    </article>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
