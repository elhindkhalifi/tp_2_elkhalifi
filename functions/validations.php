<?php
require_once("addressCrud.php");

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
            'msg' => "<h2><center>ERROR!</center></H2> Le numéro de rue ($street) utilisé est trop long."
        ];
    }
    return $result;
}
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
            'msg' => "<h2><center>ERROR!</center></H2> cette adresse dont le type est $type et zipcode est $zipcode est deja utilisée ."
        ];
    }
    return $result;
}
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
            'msg' => "<h2><center>ERROR!</center></H2> le code postale utilisé ($zipcode) contient plus ou moins de 6 caracteres."
        ];
    }
    return $result;
}

?>