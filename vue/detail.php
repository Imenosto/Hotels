<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Détail de la Chambre</title>
</head>
<body>

    <h2 class="text-center my-4">Détail de la Chambre</h2>

    <div class="text-center mb-4">
        <img class="img-fluid rounded w-50" src="utils/img/<?= $chambre['image'] ?>" alt="Card image cap">
    </div>

    <div class="text-center mb-3">
        <h4>Prix : <span class="text-success"><?= $chambre['prix'] ?>€</span> par nuit</h4>
        <p><?= $chambre['nbLits'] ?> Lit(s)</p>
        <p><?= $chambre['description'] ?></p>
    </div>

    <div class="container">
        <?php if (isset($_GET['message'])): ?>
        <div class="alert 
            <?php 
                if (strpos($_GET['message'], 'succès') !== false) {
                    echo 'alert-success'; 
                } else {
                    echo 'alert-danger';
                }
            ?>
            text-center mt-4">
            <?= htmlspecialchars($_GET['message']) ?>
        </div>
        <?php endif; ?>


        <form action="reservation.php" method="post" class="shadow p-4 rounded bg-light">
            <input type="hidden" name="numChambre" value="<?= $_GET['id'] ?>">

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" required>
            </div>
            
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" required>
            </div>
            
            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone</label>
                <input type="text" class="form-control" name="tel" id="tel" required>
            </div>

            <div class="mb-3">
                <label for="dateArrivee" class="form-label" id="dateA">Date Arrivée</label>
                <input type="date" class="form-control" name="dateArrivee" id="dateArrivee" required>
            </div>
            
            <div class="mb-3">
                <label for="dateDepart" class="form-label" id="dateD">Date Départ</label>
                <input type="date" class="form-control" name="dateDepart" id="dateDepart" required>
                <span class = "text-danger mt-2" id="dateError"></span>
            </div>

            <button type="submit" class="btn btn-outline-success w-100">Réserver</button>
        </form>
    </div>

    <script src="utils/js/detail.js"></script>
</body>
</html>
