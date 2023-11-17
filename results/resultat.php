<a href='../forms/form1.php'>Retour</a>
<?php
require_once('../config/connexion.php');
require_once('../functions/validations.php');
require_once("../functions/addressCrud.php");
session_start();

$addressNB = isset($_SESSION["number1"]["addressNB"]) ? $_SESSION["number1"]["addressNB"] : 0;
// $_SESSION["formData"] = array();
echo "<h2>Adresses:</h2><br><br> Voici les adresses que vous venez de rentrer: <br><br>";
for ($i = 1; $i <= $addressNB; $i++) {
    //recuperer les donnes dans $_SESSION
    $_SESSION["formData"]["street_nb$i"] = $_POST["street_nb$i"];
    $_SESSION["formData"]["street$i"] = $_POST["street$i"];
    $_SESSION["formData"]["city$i"] = $_POST["city$i"];
    $_SESSION["formData"]["zipcode$i"] = $_POST["zipcode$i"];
    $_SESSION["formData"]["type$i"] = $_POST["type$i"];
    //validation des adresses 
    $streetIsValid=streetIsValid($_POST["street$i"]);
    $zipCodeIsValid =zipCodeIsValid($_POST["zipcode$i"]);
    $addressIsValid=addressIsValid( $_POST["type$i"],$_POST["zipcode$i"]);
    if ($streetIsValid["isValid"] &&$zipCodeIsValid["isValid"] &&$addressIsValid["isValid"]) {
        //afficher les adresses 
        echo"Votre adresse $i est :".$_POST["street_nb$i"]." ".$_POST["street$i"].",".$_POST["city$i"].", Canada, ".$_POST["zipcode$i"] .".<br><br> Le type est:".$_POST["type$i"]."<br><br><br>";
    } else {
        //afficher les erreurs dans la page error.php
       echo" <h1><center>ADRESSES PAS VALIDES</h1></center><br><BR>
        <a href='ERROR.php'>
        <input type='submit' id='VOIR LES ERREURS' name='VOIR LES ERREURS' value='VOIR LES ERREURS'>
        </a>";
    };
};
//recuperer le nombre d'adresses pour la 2ieme fois dans $_SESSION
unset($_SESSION["number1"]["addressNB"]);
$_SESSION["number1"]["addressNB"]= $addressNB;

if ($streetIsValid["isValid"] &&$zipCodeIsValid["isValid"] &&$addressIsValid["isValid"]) {
    //demander a lutilisateur de verifier ses adresses
echo "Les informations, sont-elles correctes? <br>Clickez sur non si vous aimeriez faire des changements. ";
?>
<a href='../forms/form3.php'>
    <input type='submit' id='non' name='non' value='non'>
</a>
<a href='resultValidation.php'>
        <input type='submit' id='oui' name='oui' value='oui'>
</a>
<?php
;}
?>



