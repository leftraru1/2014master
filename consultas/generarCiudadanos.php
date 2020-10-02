<?php

function cmp($a, $b) {
    if ($a->weight == $b->weight) {
        return 0;
    }
    return ($a->weight < $b->weight) ? -1 : 1;
}

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

for ($z = 0; $z < 100; $z++) {
    $rut = rand(180000000, 300000000);
    $nombre = generateRandomString(rand(7, 11));
    $apellido = generateRandomString(rand(7, 11));
    $email = generateRandomString(rand(7, 11)) . "@gmail.com";
    $clave = rand(10000, 99999);

    $calle = rand(1, 4) . "." . rand(0, 4);
    $nroCalle = rand(100, 600);

    echo($calle);
    $query = "SELECT s.nro_calle FROM essbio.sumidero as s WHERE s.calle = '$calle' ";
    $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());

    $rowLen = pg_num_rows($result);
    //echo($rowLen);
    $nrooos = array();

    for ($i = 0; $i < $rowLen; $i++) {
        $row = pg_fetch_row($result);
        $nrooos{$i} = $row[0];
    }
    sort($nrooos);

    $count = 0;

    for ($i = 0; $i < $rowLen; $i++) {
        if ($nroCalle > $nrooos{$i}) {
            $count++;
        }
    }

    if ($count >= 10)
        $count = 9;
    else if ($count <= 1)
        $count = 9;

    $mitad = ($nrooos{$count} + $nrooos{($count - 1)}) / 2;

    if ($nroCalle > $mitad) {
        $val = $nrooos{$count};
        $query = "SELECT s.id_sumidero FROM essbio.sumidero as s WHERE s.nro_calle = '$val' ";
        $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());
        $row = pg_fetch_row($result);
        $idSumidero = $row[0];
    } else {
        $val = $nrooos{($count - 1)};
        $query = "SELECT s.id_sumidero FROM essbio.sumidero as s WHERE s.nro_calle = '$val' ";
        $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());
        $row = pg_fetch_row($result);
        $idSumidero = $row[0];
    }

    $query = "INSERT INTO essbio.ciudadano (rut,nombre,apellido,email,clave,id_sumidero,calle,admin_code,nro_calle)"
            . "VALUES($rut,'$nombre','$apellido','$email',$clave,$idSumidero,'$calle',0000,$nroCalle)";
    $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());



    for ($j = 0; $j < 3; $j++) {
        $idmensaje = rand(1, 999999);
        $problema = "obstruccion";
        $descripcion = "hay algo muy grande tapando el sumidero";

        $query = "INSERT INTO essbio.alerta (id_mensaje,tipo_problema,id_problema,descripcion,fecha,hora,id_sumidero,rut_ciudadano)
                VALUES($idmensaje,'$problema',null,'$descripcion',NOW(),NOW(),$idSumidero,$rut)";
        $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());
    }
    
    $idmensaje = rand(1,9999999 );
        $problema = "obstruccion";
        $descripcion = "hay algo muy grande tapando el sumidero";
            $query = "INSERT INTO essbio.aviso (id_mensaje,descripcion,fecha,hora,id_sumidero,rut)
                VALUES($idmensaje,'$descripcion',NOW(),NOW(),$idSumidero,$rut)";
            $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());
}
?>


