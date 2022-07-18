<?php
session_start();

//heure actuelle
$now = time();
//pas de user ou heure actuelle > heure d'expiration dans SESSION ?
if ( !isset($_SESSION['user']) OR $now > $_SESSION['expiration']):
    //suppression des entrées liée à l'user dans la session
    unset($_SESSION['user']);
    unset($_SESSION['token']);
    unset($_SESSION['function']);
    unset($_SESSION['expiration']);
    //préparation de la réponse
    $response['response'] = "Token expiré";
    $response['code'] = 401;
    echo json_encode($response);
    die();
else:
    //recup des datas json (qui contient le token)
    $json = file_get_contents('php://input');
    //décodage du format json, ça génère un array PHP
    $arrayPOST = json_decode($json, true);

    //le token passé est le différent du token dans la session ?
    if($arrayPOST['token'] != $_SESSION['token']) :
        //préparation de la réponse
        $response['response'] = "Token erroné ou manquant";
        $response['code'] = 401;
        echo json_encode($response);
        die();
    else:
        // $response['response'] = "OK";
        // $response['code'] = 200;
        // $response['function'] = $_SESSION['function'];
        // echo json_encode($response);
    endif;
endif;
$_SESSION['expiration'] = time() + 1 * 60;