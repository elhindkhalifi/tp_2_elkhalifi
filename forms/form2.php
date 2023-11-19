<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../style2.css">
    <title>Document</title>
</head>
<body>
<center>
    <h2>Les donnees de vos adresses</h2>
    <a href="form1.php">Retour</a>
</center>
<?php 
    session_start();
    $address = isset($_POST["address"]) ? $_POST["address"] : 0;
//recuperer le nombre d'adresses pour pouvoir lutiliser dans les autres boucles
    $_SESSION["number1"]["addressNB"] = $_POST["address"];
// affichage des formulaires repeated le nombre de fois que lutilisateur veut
for ($i = 1; $i <= $address; $i++) {
    ?>
    <form method="POST" action="../results/resultat.php">
        <div class="form-group">
        <input type="hidden" name="action" value="addressForm">
            <center><h3>adresse <?php echo $i; ?> </h3></center>
            <label for="street<?php echo $i; ?>">Street:</label>
            <input type="text" id="street<?php echo $i; ?>" name="street<?php echo $i; ?>" value="">
            <br>
            <label for="street_nb<?php echo $i; ?>">Street number:</label>
            <input type="number" id="street_nb<?php echo $i; ?>" name="street_nb<?php echo $i; ?>" value="">
            <br>
            <label for="type<?php echo $i; ?>">Type:</label>
            <select id="type<?php echo $i; ?>" name="type<?php echo $i; ?>">
                <option value="facturation">Facturation</option>
                <option value="livraison">Livraison</option>
                <option value="autre">Autre</option>
            </select>
            <br>
            <label for="city<?php echo $i; ?>">City:</label>
            <select id="city<?php echo $i; ?>" name="city<?php echo $i; ?>">
                <option value="Montreal">Montreal</option>
                <option value="Quebec">Quebec</option>
                <option value="Toronto">Toronto</option>
                <option value="Ottawa">Ottawa</option>
                <option value="Laval">Laval</option>
                <option value="Longueuil">Longueuil</option>
            </select>
            <br>
            <label for="zipcode<?php echo $i; ?>">Zipcode:</label>
            <input type="text" id="zipcode<?php echo $i; ?>" name="zipcode<?php echo $i; ?>" value="">
            <br>

        </div>
        <?php }; ?>
        <center>
            <input type="submit" value="Submit">
        </center>
    </form>


</body>
</html>
