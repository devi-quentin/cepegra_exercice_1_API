<?php
include 'includes/config.php';
include 'includes/headers.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // TOUS LES USERS
    if(!isset($_GET['id'])) {
        $sql = "SELECT inscriptions.id, users.firstname, users.name, users.email, users.register_date, formations.name AS formation_name FROM inscriptions 
        LEFT JOIN users ON inscriptions.id_user = users.id 
        LEFT JOIN formations ON inscriptions.id_formation = formations.id";
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'Toutes les inscriptions aux formations';
        $responseJSON['nb_hits'] = $result->num_rows;
        $responseJSON['data'] = $response;
    }
    // UN USER
    else {
        $sql = sprintf("SELECT inscriptions.id, users.firstname, users.name, users.email, users.register_date, formations.name AS formation_name FROM inscriptions 
        LEFT JOIN users ON inscriptions.id_user = users.id 
        LEFT JOIN formations ON inscriptions.id_formation = formations.id WHERE users.id = '%d'",
        $_GET['id']);
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'One user';
        $responseJSON['data'] = $response;
    }
}

echo json_encode($responseJSON);