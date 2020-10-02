<!DOCTYPE html>

<?php
$idSumidero = $_POST["sumidero"];

echo($idSumidero);
?>
<html>

    <head>

        <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
        <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
        <link rel="stylesheet" href="css/sumidero_info.css">

    </head>

    <body>
        <div class="nav nav-pills">
            <div class="container">
                <ul class="pull-left">
                    <li class="active"><a href="#">Info </a></li>
                    <!--<li><a href="#">Mapa </a></li>-->
                </ul>
                <ul class="pull-right">
                    <li><a href="globalView.php.php">globalview </a></li>
                    <li><a href="consulta.php">Consultas </a></li>
                    <li><a href="problemas.php">problemas</a></li>
                    <li><a href="filtros.php">Filtros</a></li>
                    <li><a href="verificar_logOut.php">Log Out</a></li>
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
                            <div id="info" class="col-md-12">
                                <h1>Informacion</h1>
                                <div class="col-md-4">
                                    <p>parrafo 1</p>
                                </div>
                                <div class="col-md-4">
                                    <p>parrafo 1</p>
                                </div>
                                <div class="col-md-4">
                                    <p>parrafo 1</p>
                                </div>
                            </div>
                            <div id="feed" class="col-md-12">

                                <div class="col-md-4">
                                    <h1>Alertas</h1>
                                </div>
                                <div class="col-md-4">
                                    <h1>Avisos</h1>
                                </div>
                                <div class="col-md-4">
                                    <h1>Responsables</h1>
                                </div>
                                <div id="alertas" class="col-md-4">

                                    <div class="scroll">

                                        <div class="subAlert">
                                            <div id="tipo-problema" class="col-md-5"><p>tipo problema</p></div>
                                            <div id="fecha" class="col-md-3"><p>fecha</p></div>
                                            <div id="visto" class="col-md-2"><p>visto</p></div>

                                        </div>


                                    </div>

                                </div>
                                <div id="avisos" class="col-md-4">
                                    <div class="scroll">
                                    </div>
                                </div>
                                <div id="responsables" class="col-md-4">
                                    <div class="scroll">
                                    </div>
                                </div>


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

                <div class="col-md-4">
                    <h3>Host</h3>
                    <p>Renting out your unused space could pay your bills or fund your next vacation.</p>
                    <p><a href="#">Learn more about hosting</a></p>
                </div>

                <div class="col-md-4">
                    <h3>Trust and Safety</h3>
                    <p>From Verified ID to our worldwide customer support team, we've got your back.</p>
                    <p><a href="#">Learn about trust at Airbnb</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>