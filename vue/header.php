<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Gestion Hôtellerie</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand" href=".">Gestion Hôtellerie</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php if(isset($_SESSION['user'])): ?>
                            <?php if($_SESSION['user']['role'] == "administrateur"): ?>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-success mx-2" href="chambre.php?action=ajouter">Ajouter</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-success mx-2" href="allReserv.php?action=afficher">Liste Res</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-danger mx-2" href="fonction.php?action=logout">Déconnexion</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary mx-2" href="vue/connexion.php">Connexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container-fluid">
