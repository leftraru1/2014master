<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/fondo.css">
        <link rel="stylesheet" href="css/globalView.css">
        
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/globalView.js"></script>
        <script src="js/sumidero-info.js"></script>
        
        <script>
            function myFunction() {
            var idSum = document.getElementById("idsum").textContent;
            console.log(idSum);
        }
</script>

    </head>

    <body>
        <div class="nav nav-pills">
            <div class="container">
                <ul class="pull-left">
                    <li class="active"><a href="construccion.php">Info </a></li>
                    <!--<li><a href="#">Mapa </a></li>-->
                </ul>
                <ul class="pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">globalview <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a class="sec">Sectores</a></li>
                            <li><a class="sis">Sistemas</a></li>
                            <li><a class="sum">Sumideros</a></li>
                            
                        </ul>
                    </li>
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
                            <div>

                                <?php
                                $dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7")
                                        or die('No se ha podido conectar: ');
                                $querySector = "SELECT s.num_sector FROM essbio.sector as s";
                                $resultSector = pg_query($querySector) or die('El registro fallo: ' . pg_last_error());
                                $sizeSector = pg_num_rows($resultSector);

                                for ($i = 0; $i < $sizeSector; $i++) {
                                    $aSector = pg_fetch_row($resultSector);
                                    echo"<div class='sector'>
                                    <h2>Sector:$aSector[0]</h2>
                                    <div>";

                                    $querySistema = "SELECT s.num_sistema FROM essbio.sistema as s WHERE s.num_sector = '$aSector[0]' ";
                                    $resultSistema = pg_query($querySistema) or die('El registro fallo: ' . pg_last_error());
                                    $sizeSistema = pg_num_rows($resultSistema);

                                    for ($j = 0; $j < $sizeSistema; $j++) {
                                        $aSistema = pg_fetch_row($resultSistema);
                                        echo"
                                         <div class='sistema'>
                                            
                                            <h3>Sistema:$aSistema[0]</h3>
                                            <div>
                                                <ul>";
                                        $querySumidero = "SELECT s.id_sumidero FROM essbio.sumidero as s WHERE s.num_sistema = '$aSistema[0]'";
                                        $resultSumidero = pg_query($querySumidero) or die('El registro fallo: ' . pg_last_error());
                                        $sizeSumidero = pg_num_rows($resultSumidero);

                                        for ($k = 0; $k < 6; $k++) {
                                            $sumCount=0;
                                            $aSumidero = pg_fetch_row($resultSumidero);
                                            
                                            echo"   <a onclick='myFunction()' >
                                                        <div class='sumidero'>
                                                            <div class='cuad'></div>
                                                            <p click='myFunction()' id='idsum'>$aSumidero[$sumCount]</p>
                                                        </div>
                                                    </a>";
                                            $sumCount++;
                                        }
                                        echo"</ul>
                                            </div>
                                        </div>";
                                    }
                                    echo"</div>
                                    </div>";
                                }
                                ?>      
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!--<div class="learn-more">
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
        </div>-->

    </body>
</html>