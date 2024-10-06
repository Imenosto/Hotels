<?php

include "fonction.php";
include 'vue/header.php';

if( isset($_POST['prenom']) ){
    extract($_POST);

    $numChambre = $_POST['numChambre'];
    $dateArrivee = $_POST['dateArrivee'];
    $dateDepart = $_POST['dateDepart'];


    $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservation WHERE numChambre = :numChambre 
                            AND ((dateArrivee < :dateDepart AND dateDepart > :dateArrivee))");

    $stmt->execute([
        ':numChambre' => $numChambre,
        ':dateDepart' => $dateDepart,
        ':dateArrivee' => $dateArrivee
    ]);
    $count = $stmt->fetchColumn();

    if ($count >0){
        header("Location: chambre.php?action=detail&id={$numChambre}&message=La chambre est déjà réservée pour cette période");
        exit;
    }else {
        
        //insertion client;
        $stmt = $pdo->prepare("INSERT INTO client (prenom, nom, tel) VALUES (:prenom, :nom, :tel)");
        $stmt->execute([':prenom'=>$prenom,':nom'=>$nom, ':tel'=>$tel]);

        $numClient = $pdo->lastInsertId();

        //insertion réservation
        $stmt = $pdo->prepare("INSERT INTO reservation (numClient, numChambre, dateArrivee, dateDepart) VALUES (:numClient, :numChambre, :dateArrivee, :dateDepart)");
        $stmt->execute([
            'numClient' => $numClient,
            'numChambre' => $numChambre,
            'dateArrivee' => $dateArrivee,
            'dateDepart' => $dateDepart
        ]);

        header("Location: chambre.php?action=detail&id={$numChambre}&message=Votre réservation a été effectuée avec succès.");
        exit;
    }
}

include 'vue/footer.php';