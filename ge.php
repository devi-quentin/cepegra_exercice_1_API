<?php
include 'includes/config.php';
include 'includes/headers.php';
// include 'includes/verif_auth.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $responseJSON['message'] = "Route GET pas encore active";
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
        id_option_6='%d'",
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