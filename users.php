<?php
include 'includes/config.php';
include 'includes/headers.php';
// include 'includes/verif_auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // TOUS LES USERS
    if (!isset($_GET['id'])) {
        $sql = "SELECT users.*, fonctions.name AS fonction_name FROM users
        LEFT JOIN fonctions ON users.id_fonction = fonctions.id";
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        if ($result->num_rows == 0) {
            $responseJSON['message'] = 'Aucun utilisateur dans la base de données';
            $responseJSON['code'] = 403;
        } else {
            $responseJSON['message'] = 'Liste de tous les utilisateurs';
            $responseJSON['nb_hits'] = $result->num_rows;
            $responseJSON['data'] = $response;
        }
    }
    // UN USER
    else {
        $sql = sprintf(
            "SELECT users.*, fonctions.name AS fonction_name FROM users LEFT JOIN fonctions ON users.id_fonction = fonctions.id WHERE users.id = '%d'",
            $_GET['id']
        );
        $result = $connect->query($sql);
        $response = $result->fetch_all(MYSQLI_ASSOC);
        if ($result->num_rows == 0) {
            $responseJSON['message'] = 'Cet utilisateur n\'éxiste pas';
            $responseJSON['code'] = 403;
        } else {
            $responseJSON['message'] = 'Détails d\'un utilisateur';
            $responseJSON['data'] = $response;
        }
    }
}

// POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') :
    // Récupération des données passée dans la requete POST
    $json = file_get_contents('php://input');
    $objectPOST = json_decode($json);

    // Requete SELECT pour empécher un doublon d'utilisateur
    $sql1 = sprintf(
        "SELECT email FROM users WHERE email = '%s'",
        strip_tags(addslashes($objectPOST->email))
    );
    $result1 = $connect->query($sql1);
    $response1 = $result1->fetch_all();

    // SI EMAIL DEJA EXISTANT
    if (strip_tags(addslashes($objectPOST->email)) == $response1[0][0]) {
        $responseJSON['message'] = "Email déjà existant";
        $responseJSON['code'] = 403;
    }
    else {
        // Requete SQL
        $sql = sprintf(
            "INSERT INTO users SET firstname='%s', name='%s', email='%s', password='%s', id_fonction=%d",
            strip_tags(addslashes($objectPOST->firstname)),
            strip_tags(addslashes($objectPOST->name)),
            strip_tags(addslashes($objectPOST->email)),
            strip_tags(addslashes(md5($objectPOST->password))),
            strip_tags(addslashes($objectPOST->id_fonction)),
        );
        $responseJSON['sql'] = $sql;

        // Execution de la requete
        $connect->query($sql);
        echo $connect->error;
        $responseJSON['message'] = "Utilisateur ajouté avec succès";
        $responseJSON['new_id'] = $connect->insert_id;
    }

endif; // END POST

$responseJSON['code'] = (isset($responseJSON['code'])) ? $responseJSON['code'] : 200;
echo json_encode($responseJSON);
