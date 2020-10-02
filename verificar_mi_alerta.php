<?php
// Start the session
session_start();
?>

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
                    <li><a href="welcome_usuario.php">Home </a></li>
                    <li><a href="verificar_logOut.php">Log Out </a></li>
                    <li><a href="construccion.php">Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">

                <?php

                function randIdSumidero() {
                    $idSumidero = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
                    return $idSumidero;
                }

                $id_mensaje = randIdSumidero();
                $problema = $_POST["problema"];
                $descripcion = $_POST["comment"];
                $fechaActual = date("Y/m/d");
                date_default_timezone_set("America/Santiago");
                $horaActual = date("h:i:sa");

                $usuario = $_SESSION["usuario"];
                $contra = $_SESSION["pwd"];
                
                $dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7")
                        or die('No se ha podido conectar: ');

                $query1 = "SELECT * FROM essbio.ciudadano as c WHERE nombre='$usuario' AND clave='$contra'";
                $result1 = pg_query($query1) or die('El registro fallo: ' . pg_last_error());
                $datosUsuario = pg_fetch_row($result1);


                $query = "INSERT INTO essbio.alerta VALUES($id_mensaje,'$problema',null,'$descripcion',NOW(),NOW(),$datosUsuario[5],$datosUsuario[0])";
                $result = pg_query($query) or die('El registro fallo: ' . pg_last_error());

                if($resul){
                    echo"
                        <h1>En hora buena has mandado una Alerta</h1>
                        <h2>Ahora Concepcion es una ciudad mas limpia!</h2>
                        ";
                }
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
