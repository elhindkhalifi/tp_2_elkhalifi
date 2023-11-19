<?php if (isset($_POST["action"]) && $_POST["action"] == "addresses") {
        // Valider l'entrée en utilisant la fonction de validation
        $address = $_POST['address'];
        if (addressNbIsValid($address)) {
            // L'entrée est un nombre, vous pouvez poursuivre le traitement
            header('Location: ../forms/form2Success.php'); // Rediriger vers la page de succès
            exit();
        } else {
            // L'entrée n'est pas un nombre, afficher un message d'erreur
            echo 'Veuillez saisir un nombre valide.';
        }
    }
?>