<?php
include 'includes/config.php';
include 'includes/headers.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // TOUS LES USERS
    if(!isset($_GET['id'])) {
        $sql = "SELECT inscriptions.id, inscriptions.id_user, users.firstname, users.name, users.email, users.register_date, formations.name AS formation_name, formations.id AS formation_id FROM inscriptions 
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
        $sql = sprintf("SELECT inscriptions.id, inscriptions.id_user, users.firstname, users.name, users.email, users.register_date, formations.name AS formation_name, formations.id AS formation_id FROM inscriptions 
        LEFT JOIN users ON inscriptions.id_user = users.id 
        LEFT JOIN formations ON inscriptions.id_formation = formations.id WHERE users.id = '%d'",
        $_GET['id']);
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['message'] = 'One user';
        $responseJSON['data'] = $response;
    }
}

// POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    // Récupération des données passée dans la requete POST
    $json = file_get_contents('php://input');
    $objectPOST = json_decode($json);

    // Requete SQL
    // $sql = sprintf("INSERT INTO inscriptions SET id_user='%d', id_formation='%d'",
    //     strip_tags(addslashes($objectPOST->id_user)),
    //     strip_tags(addslashes($objectPOST->id_formation)),
    // );

    $val = "";
    foreach ($objectPOST as $user) {
        $val .= "({$user->id_user}, {$user->id_formation}),";
    }
    $val = substr($val, 0, -1);
    $sql = "INSERT INTO inscriptions (id_user, id_formation) VALUES $val";

    $responseJSON['sql'] = $sql;
    print_r($sql);
    
    // Execution de la requete
    $connect->query($sql);
    echo $connect->error;
    $responseJSON['message'] = "Stagiaires inscrits avec succès";
    $responseJSON['new_id'] = $connect->insert_id;
       
endif; // END POST

echo json_encode($responseJSON);