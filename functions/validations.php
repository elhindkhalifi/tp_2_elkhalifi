<?php
require_once("addressCrud.php");
//validation de street
function  streetIsValid( $street): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';
    if (strlen($street) > 50) {
        $result = [
            'isValid' => false,
            'msg' => "Le numéro de rue ($street) utilisé est trop long."
        ];
    }
    return $result;
}
//validation de ladresses: verifier si elle est deja dans la base de donnees 
function  addressIsValid($type, $zipcode): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    $addressInDB=getUserByTypeAndZipCode($type,$zipcode);

    if ($addressInDB) {
        $result = [
            'isValid' => false,
            'msg' => "cette adresse dont le type est $type et zipcode est $zipcode est deja utilisée ."
        ];
    }
    return $result;
}
//validation du zipcode
function zipCodeIsValid($zipcode): array
{
    $result = [
        'isValid' => true,
        'msg' => ''
    ];
    echo '<br><br>';
    if (strlen($zipcode) !=6 ) {
        $result = [
            'isValid' => false,
            'msg' => "le code postale utilisé ($zipcode) contient plus ou moins de 6 caracteres."
        ];
    }
    return $result;
}

?>