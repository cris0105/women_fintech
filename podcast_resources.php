<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcast-uri</title>
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
    <h1 class="text-center">Podcast-uri</h1>
    <p class="text-center">Ascultați podcast-uri inspiratoare despre femei în tehnologie financiară direct pe Spotify.</p>

    <div class="row">
        <div class="col-md-6 mb-4">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/55Z4FZpsofOA7PejxCf8Ct?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>        </div>
        <div class="col-md-6 mb-4">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/7ypAaFHV0Er3WzO7hMdW3E?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>        </div>
        <div class="col-md-6 mb-4">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/1ciMR9WpUdHGQNC0WsoPw8?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>        </div>
        <div class="col-md-6 mb-4">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/6bN7vLrmYvBM87re6eFXr3?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>        </div>
        </div>
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
