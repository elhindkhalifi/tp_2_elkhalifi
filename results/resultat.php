<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styleResult.css">
    <title>Confirmation d'Adresse</title>
</head>
<body>

<div class="container">
    <a href='../forms/form1.php'>Retour</a>

    <?php
    require_once('../config/connexion.php');
    require_once('../functions/validations.php');
    require_once("../functions/addressCrud.php");
    session_start();

    $addressNB = isset($_SESSION["number1"]["addressNB"]) ? $_SESSION["number1"]["addressNB"] : 0;
    $allAddressesValid=true;

    for ($i = 1; $i <= $addressNB; $i++) {
        // Recuperer les donnees dans $_SESSION pour les utiliser dans resultValidation.php pour les ajouter a la base de donnees
        $_SESSION["formData"]["street_nb$i"] = $_POST["street_nb$i"];
        $_SESSION["formData"]["street$i"] = $_POST["street$i"];
        $_SESSION["formData"]["city$i"] = $_POST["city$i"];
        $_SESSION["formData"]["zipcode$i"] = $_POST["zipcode$i"];
        $_SESSION["formData"]["type$i"] = $_POST["type$i"];

        // Validation des adresses
        $streetIsValid = streetIsValid($_POST["street$i"]);
        $zipCodeIsValid = zipCodeIsValid($_POST["zipcode$i"]);
        $addressIsValid = addressIsValid($_POST["type$i"], $_POST["zipcode$i"]);
        
        if (!$streetIsValid["isValid"] || !$zipCodeIsValid["isValid"] || !$addressIsValid["isValid"]) {
            $allAddressesValid = false;
            // Afficher les erreurs et passer a l'iteration suivante 
            echo "<h1 class='error'>Erreur dans l'adresse $i :</h1>";
            echo "<p class='error'>" . $streetIsValid["msg"] . "</p>";
            echo "<p class='error'>" . $zipCodeIsValid["msg"] . "</p>";
            echo "<p class='error'>" . $addressIsValid["msg"] . "</p>";
        };};
        
        // Afficher toutes les adresses quand elles sont toutes valides
        if ($allAddressesValid) {
            for ($i = 1; $i <= $addressNB; $i++) {
                echo "<h2>Adresse $i</h2>";
                echo "<p>Street: " . $_POST["street$i"] . "</p>";
                echo "<p>Street Number: " . $_POST["street_nb$i"] . "</p>";
                echo "<p>Type: " . $_POST["type$i"] . "</p>";
                echo "<p>City: " . $_POST["city$i"] . "</p>";
                echo "<p>Zipcode: " . $_POST["zipcode$i"] . "</p><br>";
            }
        }

    ?>

    <?php if ($streetIsValid["isValid"] && $zipCodeIsValid["isValid"] && $addressIsValid["isValid"]) : ?>
        <div class="buttons">
            <!-- Revenir a un formulaire pour modifier avec des champs préremplis -->
            <a href='../forms/form3.php'>
                <input type='button' id='modifier' name='modifier' value='Modifier'>
            </a>

            <!-- Ajouter les adresses a la base de données -->
            <a href='resultValidation.php'>
                <input type='button' id='valider' name='valider' value='Valider'>
            </a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
