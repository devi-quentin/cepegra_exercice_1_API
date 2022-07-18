<?php
include 'includes/config.php';
include 'includes/headers.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // TOUS LES LIEUX
    if(!isset($_GET['id'])) {
        $sql = "SELECT * FROM lieux";
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'Liste des lieux';
        $responseJSON['nb_hits'] = $result->num_rows;
        $responseJSON['data'] = $response;
    }
    // UN USER
    else {
        $sql = sprintf("SELECT * FROM lieux WHERE id = '%d'",
        $_GET['id']);
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'Nom du lieu de l\'ID';
        $responseJSON['data'] = $response;
    }
}

echo json_encode($responseJSON);