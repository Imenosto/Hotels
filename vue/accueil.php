<div class="container my-4">
    <h2 class="text-center">Chambres</h2>

    <div class="row justify-content-center">
        <?php foreach($chambres as $chambre): ?>
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="card my-3" style="width: 18rem;">
                    <img class="card-img-top" src="utils/img/<?= $chambre['image'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $chambre['prix'] ?>€</h5>
                        <p class="card-text"><?= $chambre['nbLits'] ?> lit(s)</p>
                        <p class="card-text"><?= $chambre['nbPers'] ?> personne(s)</p>
                        <a href="chambre.php?action=detail&id=<?= $chambre['numChambre'] ?>" class="btn btn-primary">Détails</a>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "administrateur"): ?>
                            <a href="chambre.php?action=supprimer&id=<?= $chambre['numChambre'] ?>" class="btn btn-danger ms-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?');">Supprimer</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
