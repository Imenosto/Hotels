<div class="container my-4">
    <h2 class="text-center">Liste des Réservations</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>Numéro de Réservation</th>
                <th>Numéro de Client</th>
                <th>Numéro de Chambre</th>
                <th>Date Arrivée</th>
                <th>Date Départ</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($reservations)): ?>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?= htmlspecialchars($reservation['numReservation']) ?></td>
                        <td><?= htmlspecialchars($reservation['numClient']) ?></td>
                        <td><?= htmlspecialchars($reservation['numChambre']) ?></td>
                        <td><?= htmlspecialchars($reservation['dateArrivee']) ?></td>
                        <td><?= htmlspecialchars($reservation['dateDepart']) ?></td>
                        <td>
                            <a href="modifierReserv.php?id=<?= $reservation['numReservation'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="supprimerReserv.php?id=<?= $reservation['numReservation'] ?>" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Aucune réservation trouvée</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
