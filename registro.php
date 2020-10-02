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
                    <li><a href="index.php">Login </a></li> 
                    <li><a href="construccion.php">Guia </a></li> 
                </ul>
            </div>
        </div>


        <div class="jumbotron">
            <div class="container">
                <h1>Registro</h1>
                <!--<p>Rent from people in over 34,000 cities and 192 countries.</p>
                <a href="#">Learn More</a>
                -->
                <div id="botones">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div >

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="btn">
                                    <form name="registro" action="verificar_registro.php" method="POST" >  
                                        <li>Rut:</li><li><input ng-change="" type="text" name="rut" /></li>  
                                        <li>Nombre:</li><li><input type="text" name="nombre" /></li>  
                                        <li>Apellido:</li><li><input type="text" name="apellido" /></li>  
                                        <li>Email:</li><li><input type="text" name="email" /></li>  
                                        <li>Clave:</li><li><input type="text" name="clave" /></li>
                                        <li>Confirmar Clave:</li><li><input type="text" name="clave_confirm" /></li>
                                        <li>Codigo Admin:</li><li><input value="0000" type="text" name="admin_cod" /></li>  
                                        <li>Nro Calle:</li><li><input value="" type="text" name="nroCalle" /></li>
                                        <?php
                                        $dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7")
                                                    or die('No se ha podido conectar: ');
                                        $query2 = "SELECT DISTINCT(s.calle) FROM essbio.sumidero as s";
                                        $result2 = pg_query($query2) or die('El registro fallo: ' . pg_last_error());

                                        $sizeResult2 = pg_num_rows($result2);
                                            
                                            echo"<li><label for='comment' >Calle</label></li>\n
                                                <select id='alertaProblema' name='calle' >";
                                            echo"<li><option value=''>Calles</option><li>
                                                <option value='--Any--'>--Any--</option>";
                                            $i = 0;
                                            while ($i < $sizeResult2) {
                                                $row = pg_fetch_row($result2);
                                                echo " <li><option value='$row[0]'>$row[0]</option></li>";
                                                $i++;
                                            }
                                        ?>
                                        <li><input type="submit" /></li>  
                                    </form> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div >

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