<?php
include 'includes/config.php';
include 'includes/headers.php';
session_start();
// -----------
// DECONNEXION
// -----------
if ( isset($_GET['logout']) ) :
    unset($_SESSION['user']);
    unset($_SESSION['token']);
    unset($_SESSION['expiration']);

    $response['response'] = "déconnexion";
    $response['time'] = date('Y-m-d,H:i:s');
    $response['code'] = 200;
    echo json_encode($response);
    exit;
endif;

// ---------
// CONNEXION
// ---------
$json = file_get_contents('php://input');
$arrayPOST = json_decode($json, true);

// SI CHAMPS VIDE
if ( !isset($arrayPOST['login']) OR !isset($arrayPOST['password'])) :
    $response['message'] = "Il manque le login et/ou le mot de passe";
    $response['code'] = 412;
    $response['ok'] = false;
else:
    // Conenxion avec l'email   
    $sql = sprintf("SELECT * FROM users WHERE email = '%s' AND password = '%s'",
        $arrayPOST['login'],
        md5($arrayPOST['password'])
    );
    $result = $connect->query($sql);
    echo $connect->error;
    $nb_rows =  $result->num_rows;

    // Si aucune correspondances
    if($nb_rows == 0) :
        $response['message'] = 'Login et/ou mot de passe incorrecte(s)';
        $response['code'] = 403;
        $response['ok'] = false;

    // Si correspondances
    else :
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $row = $row[0];
        $_SESSION['user'] = $row['id'];
        $_SESSION['token'] = md5($row['email'].time());
        $_SESSION['function'] = $row['id_fonction'];
        $_SESSION['expiration'] = time() + 1 * 60;

        $response['response'] = "Connecté";
        $response['token'] = $_SESSION['token'];
        $response['function'] = $_SESSION['function'];
        $response['ok'] = true;
    endif;
endif;

$response['code'] = ( isset($response['code']) ) ? $response['code'] : 200;

echo json_encode($response);
exit;