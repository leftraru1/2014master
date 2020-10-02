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
                                    <h2>Danos tu Aviso!</h2>
                                    <form method="POST" action="verificar_mi_aviso.php">
                                        <ul>
                                            <?php
                                            $dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7")
                                                    or die('No se ha podido conectar: ');


                                            $query1 = "SELECT s.num_sistema FROM essbio.sistema as s";
                                            $result1 = pg_query($query1) or die('El registro fallo: ' . pg_last_error());

                                            $sizeResult1 = pg_num_rows($result1);

                                            echo"\t<li><label for='comment' >Sistema</label>\n
                                    <select id='alertaProblema' name='sistema' >";
                                            echo"<option value=''>Sistemas</option>
                                        <option value='--Any--'>--Any--</option>";


                                            $i = 0;
                                            while ($i < $sizeResult1) {
                                                $row = pg_fetch_row($result1);
                                                echo " <option value='$row[0]'>$row[0]</option>";
                                                $i++;
                                            }
                                            echo"</select></li>";

                                            $query2 = "SELECT s.id_sumidero FROM essbio.sumidero as s";
                                            $result2 = pg_query($query2) or die('El registro fallo: ' . pg_last_error());

                                            $sizeResult2 = pg_num_rows($result2);
                                            echo"\t<li><label for='comment' >Sumidero</label>\n
                                    <select id='alertaProblema' name='sumidero' >";
                                            echo"<option value=''>Sumideros</option>
                                        <option value='--Any--'>--Any--</option>";

                                            $i = 0;
                                            while ($i < $sizeResult2) {
                                                $row = pg_fetch_row($result2);
                                                echo " <option value='$row[0]'>$row[0]</option>";
                                                $i++;
                                            }
                                            echo"</select></li>";

                                            echo"
                                    <li><label for='comment' >Describe en mas detalle el problema!</label></li>
                                    <li><textarea name='comment' rows='5' cols='40'></textarea></li>    
                                    <li><input type='submit' /></li>";
                                            ?>
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
