<?php
include 'includes/config.php';
include 'includes/headers.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // TOUS LES METIERS
    if(!isset($_GET['id_metier'])) {
        $sql = "SELECT * FROM criteres_evaluations";
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'Liste des critères d\'évaluations';
        $responseJSON['nb_hits'] = $result->num_rows;
        $responseJSON['data'] = $response;
    }
    // UN USER
    else {
        $sql = sprintf("SELECT * FROM criteres_evaluations WHERE id_metier = '%d'",
        $_GET['id_metier']);
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'Nom du métier de l\'ID';
        $responseJSON['data'] = $response;
    }
}

echo json_encode($responseJSON);