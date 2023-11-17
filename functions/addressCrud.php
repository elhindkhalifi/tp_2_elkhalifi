<?php
//ajouter ladresse a la base de donner
 function createAddress($data) {
    global $conn;
    $query="INSERT INTO address VALUES (NULL,?,?,?,?,?)";
    If( $stmt=mysqli_prepare($conn, $query)){
    /* Lecture des marqueurs */
    mysqli_stmt_bind_param($stmt,"sssss",$data['street'],$data['street_nb'],$data['type'],$data['city'],$data['zipcode']);
    /* Exécution de la requête*/
    $result= mysqli_stmt_execute($stmt);
    echo "<br> <br>";
    echo"coucou ADRESSE AJOUTE";
    echo "<br> <br>";
    var_dump($result);
    return $result;
        }
        };


// but: utiliser cette fonction pour pouvoir valider ladresse dans validations.php
function getUserByTypeAndZipCode($type,$zipcode)
{
    global $conn;

    $query = "SELECT * FROM address WHERE type = '" . $type . "' AND zipcode = '" . $zipcode . "';";

    //var_dump($query);
    $result = mysqli_query($conn, $query);

        // avec fetch row : tableau indexé
        $data = mysqli_fetch_assoc($result);
        return $data;
}


?>