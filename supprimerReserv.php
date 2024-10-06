<?php
include "fonction.php"; 

if (isset($_GET['id'])) {
    $numReservation = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM reservation WHERE numReservation = :numReservation");
    $stmt->execute([':numReservation' => $numReservation]);

    header("Location: allReserv.php?action=afficher&message=La réservation a été supprimée avec succès.");
    exit;
}
