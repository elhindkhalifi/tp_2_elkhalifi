<a href='../forms/form1.php'>Retour</a>
<?php
require_once('../config/connexion.php');
require_once('../functions/validations.php');
session_start();
//     unset($_SESSION );

// Access the session variable set in file1.php
$addressNB = isset($_SESSION["number1"]["addressNB"]) ? $_SESSION["number1"]["addressNB"] : 0;

echo "<h2>Adresses:</h2><br><br> Voici les adresses que vous venez de rentrer: <br><br>";
for ($i = 1; $i <= $addressNB; $i++) {
echo"Votre adresse $i est :".$_POST["street_nb$i"]." ".$_POST["street$i"].",".$_POST["city$i"].", Canada, ".$_POST["zipcode$i"] .".<br><br> Le type est:".$_POST["type$i"]."<br><br><br><br><br>";
};
for ($i = 1; $i <= $addressNB; $i++) {
    $_SESSION["formData"]["street_nb$i"] = $_POST["street_nb$i"];
    $_SESSION["formData"]["street$i"] = $_POST["street$i"];
    $_SESSION["formData"]["city$i"] = $_POST["city$i"];
    $_SESSION["formData"]["zipcode$i"] = $_POST["zipcode$i"];
    var_dump($_SESSION["formData"]);
    };
echo "Les informations, sont-elles correctes? <br>Clickez sur non si vous aimeriez faire des changements. ";
unset($_SESSION["number1"]["addressNB"]);

$_SESSION["number1"]["addressNB"]= $addressNB;


?><a href='../forms/form3.php'>Retour<input type='submit' id='non' name='choix' value='non'></a>
   <!-- <form action='' method='post'>
    <input type='radio' id='oui' name='choix' value='oui'>
    <label for='oui'>Oui</label>

    <a href='../forms/form3.php'><input type='submit' id='non' name='choix' value='non'></a>
    <label for='non'>Non</label>

    <input type='submit' value='soumettre'>
</form> -->
<?php 
    // if (isset($_POST['choix'])) {
    //     if ($_POST['choix'] == 'non') {
    //         header('Location: ../forms/form3.php');
    //         exit();
    //     } elseif ($_POST['choix'] == 'oui') {
    //     }
    // }
?> 


