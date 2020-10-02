<?php

function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

    
    $dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7")
        or die('No se ha podido conectar: ');
    
    
    $idmensaje= rand(1,999999);
    
    $query = "SELECT c.id_sumidero,c.rut FROM essbio.ciudadano as c WHERE s.calle = '$calle' ";
    $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());
    
    $query = "INSERT INTO essbio.alerta (id_mensaje,tipo_problema,id_problema,descripcion,fecha,hora,id_sumidero,rut_ciudadano)"
            . "VALUES($rut,'$nombre','$apellido','$email',$clave,$idSumidero,'$calle',0000,$nroCalle)";
    $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());
    
    




?>

