<!DOCTYPE html>
<html>
    <head>
        <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
        <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
        <link rel="stylesheet" href="css/fondo.css">
        <link rel="stylesheet" href="css/btnStatic.css">
        <link rel="stylesheet" href="css/navigation.css">
        <title></title>
    </head>
    <body>
        <div class="nav nav-pills">
            <div class="container">
                <ul class="pull-left">
                    <li class="active"><a href="construccion.php">Info </a></li>
                    <!--<li><a href="#">Mapa </a></li>-->
                </ul>
                <ul class="pull-right">
                    <li><a href="index.php">Login </a></li> 
                    <li><a href="construccion.php">Guia </a></li> 
                </ul>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">

                <?php
                $dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7")
                        or die('No se ha podido conectar: ');

                function generateRandomString($length = 10) {
                    $characters = 'abcdefghijklmnopqrstuvwxyz';
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, strlen($characters) - 1)];
                    }
                    return $randomString;
                }

                $rut = $_POST["rut"];
                $nombre  = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $email = $_POST["email"];
                $clave = $_POST["clave"];
                $confirmClave = $_POST["clave_confirm"];
                $calle = $_POST["calle"];
                $nroCalle = $_POST["nroCalle"];

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

                
                if($clave == $confirmClave){
                    $query = "INSERT INTO essbio.ciudadano (rut,nombre,apellido,email,clave,id_sumidero,calle,admin_code,nro_calle)"
                        . "VALUES($rut,'$nombre','$apellido','$email',$clave,$idSumidero,'$calle',0000,$nroCalle)";
                $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());




                echo "
                            <h1>Bienvenido a Essbio!</h1>
                            <h2>Juntos seremos mejores ciudadanos</h2>
                            
                            <a href='index.php'>Inicie sesion y comience a ser mejor ciudadano!</a>
                            ";
                
                }else{
                    echo"
                    <h1>Algo extranio Paso!</h1>
                            <h2>quedate estamos solucionando el problema</h2>
                ";}
                ?>
                <div id='botones'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-md-4'>

                                <div class='col-md-4'>

                                </div>
                                <div class='col-md-4'>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="learn-more">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <h3><a href="https://www.essbio.cl/hogar/hogar.php">Essbio</a></h3>
                        <p>Pagina Principal.</p>

                    </div >

                </div>
            </div>
        </div>
    </div>

</body>
</html>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
