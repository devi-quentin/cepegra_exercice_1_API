<?php
include 'includes/config.php';
include 'includes/headers.php';
// include 'includes/verif_auth.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id_user'])) {
        $sql = 'SELECT * FROM ge WHERE id_user = ' . $_GET['id_user'];
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        $responseJSON['data'] = $response;
        $responseJSON['message'] = "GE du stagiaire";
    }
    $responseJSON['message'] = "Il manque un parametre d'url";
}

// POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    // Récupération des données passée dans la requete POST
    $json = file_get_contents('php://input');
    $objectPOST = json_decode($json);

    // Requete SQL
    $sql = sprintf("INSERT INTO ge SET 
        id_user='%d',
        id_metier='%d',
        id_theme_1='%d',
        id_option_1='%d',
        id_theme_2='%d',
        id_option_2='%d',
        id_theme_3='%d',
        id_option_3='%d',
        id_theme_4='%d',
        id_option_4='%d',
        id_theme_5='%d',
        id_option_5='%d',
        id_theme_6='%d',
        id_option_6='%d',
        value_1='%d',
        value_2='%d',
        value_3='%d',
        value_4='%d',
        value_5='%d',
        value_6='%d'",
        strip_tags(addslashes($objectPOST->id_user)),
        strip_tags(addslashes($objectPOST->id_metier)),
        strip_tags(addslashes($objectPOST->id_theme_1)),
        strip_tags(addslashes($objectPOST->id_option_1)),
        strip_tags(addslashes($objectPOST->id_theme_2)),
        strip_tags(addslashes($objectPOST->id_option_2)),
        strip_tags(addslashes($objectPOST->id_theme_3)),
        strip_tags(addslashes($objectPOST->id_option_3)),
        strip_tags(addslashes($objectPOST->id_theme_4)),
        strip_tags(addslashes($objectPOST->id_option_4)),
        strip_tags(addslashes($objectPOST->id_theme_5)),
        strip_tags(addslashes($objectPOST->id_option_5)),
        strip_tags(addslashes($objectPOST->id_theme_6)),
        strip_tags(addslashes($objectPOST->id_option_6)),
        strip_tags(addslashes($objectPOST->value_1)),
        strip_tags(addslashes($objectPOST->value_2)),
        strip_tags(addslashes($objectPOST->value_3)),
        strip_tags(addslashes($objectPOST->value_4)),
        strip_tags(addslashes($objectPOST->value_5)),
        strip_tags(addslashes($objectPOST->value_6)),
    );
    $responseJSON['sql'] = $sql;
    
    // Execution de la requete
    $connect->query($sql);
    $responseJSON['error'] = $connect->error;
    $responseJSON['message'] = "GE ajoutée avec succès";
    $responseJSON['new_id'] = $connect->insert_id;
       
endif; // END POST

$responseJSON['code'] = (isset($responseJSON['code'])) ? $responseJSON['code'] : 200;
echo json_encode($responseJSON);