<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women in FinTech</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="membersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Membrii
                </a>
                <div class="dropdown-menu" aria-labelledby="membersDropdown">
                    <a class="dropdown-item" href="add_member.php">Adaugă Membru Nou</a>
                    <a class="dropdown-item" href="members.php">Afișează Lista Membrii</a>
                    <a class="dropdown-item" href="search_member.php">Caută Membrii</a>
                </div>
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
            <div class="ml-auto d-flex align-items-center">
                <button class="btn btn-secondary mr-2" id="darkModeToggle">Dark Mode</button>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="logout.php" class="btn btn-light">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-light">Login</a>
                    <a href="register.php" class="btn btn-outline-light">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Autentificare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Introdu adresa de email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Parolă:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Introdu parola" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Autentificare</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Înregistrare</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label for="first_name">Prenume:</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Introdu prenumele" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Nume:</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Introdu numele" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Introdu adresa de email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Parolă:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Creează o parolă" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Rol:</label>
                        <select name="role" id="role" class="form-control">
                            <option value="member">Membru</option>
                            <option value="mentor">Mentor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Înregistrează-te</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
