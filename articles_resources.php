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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="members.php">Membrii</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="resourceHub" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Resource Hub
                    </a>
                    <div class="dropdown-menu" aria-labelledby="resourceHubMenu">
                        <a class="dropdown-item" href="articles_resources.php">Articole și materiale</a>
                        <a class="dropdown-item" href="video_resources.php">Materiale video</a>
                        <a class="dropdown-item" href="podcast_resources.php">Podcast-uri</a>
                        <a class="dropdown-item" href="downloadable_resources.php">Resurse downloadable</a>
                    </div>
                </li>
            </ul>
            <button class="btn btn-secondary ml-auto" id="darkModeToggle">Dark Mode</button>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1 class="text-center mb-4">Articole și materiale</h1>
    
    <!-- Articol 1 -->
    <article class="mb-5">
        <h2>Femeile în Tehnologie: Construirea unui Viitor Incluziv</h2>
        <p><strong>Domeniul tehnologiei este unul dintre cele mai dinamice și inovatoare sectoare din lume.</strong></p>
        <p>Cu toate acestea, disparitățile de gen rămân o provocare majoră. Femeile continuă să fie subreprezentate în industria tehnologică, dar pașii în direcția egalității sunt vizibili și importanți...</p>
        <p>Conferințe globale, inițiative de mentorat și programe educaționale dedicate femeilor în tehnologie sunt doar câteva dintre eforturile care transformă industria...</p>
        <p><a href="article1.php" class="btn btn-primary">Citește mai mult</a></p>
    </article>

    <!-- Articol 2 -->
    <article class="mb-5">
        <h2>Importanța Rețelelor de Networking pentru Femeile din Tehnologie</h2>
        <p><strong>Rețelele de networking joacă un rol vital în succesul profesional.</strong></p>
        <p>Aceste rețele sunt un instrument esențial pentru femeile care doresc să își construiască o carieră solidă și să își lărgească orizonturile. Prin acces la rețele profesionale, femeile pot învăța...</p>
        <p><a href="article2.php" class="btn btn-primary">Citește mai mult</a></p>
    </article>

    <!-- Articol 3 -->
    <article class="mb-5">
        <h2>Resurse Educaționale pentru Femeile din Tehnologie</h2>
        <p><strong>Educația este cheia pentru a reduce disparitățile de gen în tehnologie.</strong></p>
        <p>Există multe platforme și resurse gratuite care pot ajuta femeile să învețe programare, să dezvolte abilități digitale și să își înceapă cariera în tehnologie...</p>
        <p><a href="article3.php" class="btn btn-primary">Citește mai mult</a></p>
    </article>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('darkModeToggle').addEventListener('click', function() {
        const body = document.body;
        const isDarkMode = body.classList.toggle('dark-mode');
        document.cookie = "dark_mode=" + isDarkMode + "; path=/";
    });
</script>
</body>
</html>
