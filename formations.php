<?php
include 'includes/config.php';
include 'includes/headers.php';
// include 'includes/verif_auth.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // TOUTES LES FORMATIONS
    if(!isset($_GET['id'])) {
        $sql = "SELECT formations.id, formations.name, formations.start_date, formations.formateur, metiers.name AS metier, lieux.name AS lieux FROM formations
        LEFT JOIN metiers ON formations.id_metier = metiers.id        
        LEFT JOIN lieux ON formations.id_lieu = lieux.id";
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        if ($result->num_rows == 0) {
            $responseJSON['message'] = 'Aucune formation dans la base de données';
            $responseJSON['code'] = 403;
        }
        else {
            $responseJSON['message'] = 'Liste de toutes les formations';
            $responseJSON['nb_hits'] = $result->num_rows;
            $responseJSON['data'] = $response;
        }
    }
    // UN USER
    else {
        $sql = sprintf("SELECT formations.id, formations.name, formations.start_date, formations.formateur, metiers.name AS metier, lieux.name AS lieux FROM formations
        LEFT JOIN metiers ON formations.id_metier = metiers.id        
        LEFT JOIN lieux ON formations.id_lieu = lieux.id WHERE formations.id = '%d'",
        $_GET['id']);
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        if ($result->num_rows == 0) {
            $responseJSON['message'] = 'Cette formation n\'éxiste pas';
            $responseJSON['code'] = 403;
        }
        else {
            $responseJSON['message'] = 'Détails d\'une formation';
            $responseJSON['data'] = $response;
        }
    }
}

// POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    // Récupération des données passée dans la requete POST
    $json = file_get_contents('php://input');
    $objectPOST = json_decode($json);

    // Requete SQL
    $sql = sprintf("INSERT INTO formations SET id_metier='%d', name='%s', start_date='%s', formateur='%s',id_lieu=%d",
        strip_tags(addslashes($objectPOST->id_metier)),
        strip_tags(addslashes($objectPOST->name)),
        strip_tags(addslashes($objectPOST->start_date)),
        strip_tags(addslashes($objectPOST->formateur)),
        strip_tags(addslashes($objectPOST->id_lieu)),
    );
    $responseJSON['sql'] = $sql;
    
    // Execution de la requete
    $connect->query($sql);
    echo $connect->error;
    $responseJSON['message'] = "Formation ajoutée avec succès";
    $responseJSON['new_id'] = $connect->insert_id;
       
endif; // END POST

$responseJSON['code'] = (isset($responseJSON['code'])) ? $responseJSON['code'] : 200;
echo json_encode($responseJSON);