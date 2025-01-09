<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resurse Educaționale pentru Femeile din Tehnologie</title>
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
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1>Resurse Educaționale pentru Femeile din Tehnologie</h1>
    <p><strong>Educația este cheia pentru reducerea disparităților de gen în industria tehnologică.</strong></p>
    <p>În prezent, există numeroase resurse gratuite sau accesibile care pot ajuta femeile să dezvolte abilități în domenii precum programarea, analiza datelor, și inteligența artificială.</p>
    
    <h3>Top Resurse Recomandate:</h3>
    <ul>
        <li><strong>Coursera și Udemy:</strong> Oferă cursuri online gratuite și accesibile despre Python, analiza datelor și multe altele.</li>
        <li><strong>Codecademy:</strong> Platformă ideală pentru începători care doresc să învețe programare.</li>
        <li><strong>Khan Academy:</strong> Lecții interactive în matematică și știință.</li>
    </ul>
    
    <h3>Inițiative pentru Femei:</h3>
    <p>Organizații precum <em>"Girls Who Code"</em> și <em>"Women in Tech"</em> oferă resurse gratuite, webinarii și programe de mentorat dedicate femeilor. Aceste resurse le ajută pe femei să construiască un portofoliu profesional și să acceseze oportunități în companii de top.</p>

    <a href="articles_resources.php" class="btn btn-secondary mt-4">Înapoi la Articole</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
