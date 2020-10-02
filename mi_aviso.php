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
                <h1>Sistema de Informacion</h1>
                <h2>colectores aguas lluvia</h2>
                <div id="botones">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6">
                                <div class="btn">
                                    <h2>Avisanos que esta pasando!</h2>
                                    <form method="POST" action="verificar_mi_aviso.php">
                                        <ul>
                                            <li><label for="comment" >Describe en mas detalle!</label></li>
                                            <li><textarea name="comment" rows="5" cols="40"></textarea></li>    
                                            <li><input type="submit" /></li> 
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">

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
</body>
</html>
