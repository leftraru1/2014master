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
                    <li><a href="index.php">Login </a></li> 
                    <li><a href="construccion.php">Guia </a></li> 
                </ul>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <?php
// remove all session variables
                session_unset();

// destroy the session 
                session_destroy();

                
                    echo"
                        <h1>Gracias por tu ayuda!</h1>
                        <h2>Eres de gran necesidad para mantener esta hermosa ciudad mas limpia!</h2>
                        ";
                
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


