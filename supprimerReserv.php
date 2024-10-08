<?php
include "fonction.php"; 


if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'administrateur') {
    header("Location: allReserv.php?action=afficher&message=Vous n'avez pas les droits nécessaires pour effectuer cette action.");
    exit;
}

if (isset($_GET['id'])) {
    $numReservation = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM reservation WHERE numReservation = :numReservation");
    $stmt->execute([':numReservation' => $numReservation]);

    header("Location: allReserv.php?action=afficher&message=La réservation a été supprimée avec succès.");
    exit;
} else {
    header("Location: allReserv.php?action=afficher&message=Aucune réservation sélectionnée pour la suppression.");
    exit;
}
