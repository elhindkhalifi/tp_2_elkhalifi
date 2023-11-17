<?php
require_once('../config/connexion.php');
require_once('../functions/validations.php');
require_once("../functions/addressCrud.php");
session_start();
$addressNB = isset($_SESSION["number1"]["addressNB"]) ? $_SESSION["number1"]["addressNB"] : 0;
for ($i = 1; $i <= $addressNB; $i++) {
    $streetIsValid=streetIsValid($_SESSION["formData"]["street$i"]);
    $zipCodeIsValid =zipCodeIsValid($_SESSION["formData"]["zipcode$i"]);
    $addressIsValid=addressIsValid( $_SESSION["formData"]["type$i"],$_SESSION["formData"]["zipcode$i"]);
    //afficher les erreurs 
     echo $streetIsValid["msg"];
     echo $zipCodeIsValid["msg"];
     echo $addressIsValid["msg"];;
}

?>