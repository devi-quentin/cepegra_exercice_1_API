<?php
include 'includes/config.php';
include 'includes/headers.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // TOUS LES METIERS
    if(!isset($_GET['id'])) {
        $sql = "SELECT * FROM metiers";
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'Liste des métiers';
        $responseJSON['nb_hits'] = $result->num_rows;
        $responseJSON['data'] = $response;
    }
    // UN USER
    else {
        $sql = sprintf("SELECT * FROM metiers WHERE id = '%d'",
        $_GET['id']);
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'Nom du métier de l\'ID';
        $responseJSON['data'] = $response;
    }
}

echo json_encode($responseJSON);