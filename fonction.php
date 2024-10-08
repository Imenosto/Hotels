<?php
session_start();

$pdo = new PDO("mysql:host=localhost;dbname=hotel", "root", "",[
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

function getAll($table){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM " . $table);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllReservations() {
    return getAll('reservation'); 
}


function getOne($table, $column, $id){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM " . $table ." WHERE ". $column ."=?");
    $stmt->execute([$id]);

    return $stmt->fetch();
}

if (isset($_POST["login"])) {
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = ? AND pass = ? AND role = ?");
    $stmt->execute([$_POST['login'], $_POST['mdp'], $_POST['role']]);

    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: .");
        exit;
    } else {
        $_SESSION['error'] = "Login, mot de passe ou rôle incorrect. Veuillez réessayer.";
        header("Location: vue/connexion.php");
        exit;
    }
} else if (isset($_GET['action']) && $_GET['action'] == "logout") {
    session_destroy();
    header("Location: .");
    exit;
}


$reservations = [];
if (isset($_GET['action']) && $_GET['action'] === 'afficher') {
    $reservations = getAll('reservation'); 
}

