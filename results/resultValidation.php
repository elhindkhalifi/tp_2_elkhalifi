<?php
require_once('../config/connexion.php');
require_once('../functions/validations.php');
require_once("../functions/addressCrud.php");
session_start();
var_dump($_SESSION["formData"]);
$addressNB = isset($_SESSION["number1"]["addressNB"]) ? $_SESSION["number1"]["addressNB"] : 0;
for ($i = 1; $i <= $addressNB; $i++) {
$newAddressData = [
    "street" => $_SESSION["formData"]["street$i"],
    "street_nb" => $_SESSION["formData"]["street_nb$i"],
    "type" => $_SESSION["formData"]["type$i"],
    "city"=> $_SESSION["formData"]["city$i"],
    "zipcode"=> $_SESSION["formData"]["zipcode$i"],
];
//ajouter ladresse dans la base donnees
createAddress($newAddressData);
}
?>