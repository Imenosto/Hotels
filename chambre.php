<?php

include "fonction.php";
include "vue/header.php";

if( isset($_GET['action']) ){
    $action = $_GET['action'];

    switch($action){
        case "ajouter": 
            if( isset($_POST['prix']) ){

                extract($_POST);

                // Upload de l'image
                if(isset($_FILES['image']['name'])){
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $fileName = $_FILES['image']['name'];
                    $extensions = ["jpeg", "jpg", "png"];

                    if( in_array($infoImage['extension'], $extensions) ){
                        move_uploaded_file($_FILES['image']['tmp_name'], "utils/img/". $fileName);
                    }
                }

                $query = "INSERT INTO chambre VALUES(NULL, :prix, :lit, :cap, :img, :desc)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    "prix"  => $prix,
                    "lit"   => $nbLits,
                    "cap"   => $nbPers,
                    "img"   => $fileName,
                    "desc"  => $description
                ]);

                header("location: .");
                exit;
            }

            include "vue/addChbre.php";
            break;

        case "detail":
            $chambre = getOne("chambre", "numChambre", $_GET['id']);
            include "vue/detail.php";
            break;

        case "supprimer":
            if (isset($_GET['id'])) {
                $numChambre = $_GET['id'];
                $stmt = $pdo->prepare("DELETE FROM chambre WHERE numChambre = :numChambre");
                $stmt->execute([':numChambre' => $numChambre]);
                header("location: .");
                exit;
            }
            break;
            
    }
}

include "vue/footer.php";
