<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
        <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
        <link rel="stylesheet" href="css/navigation.css">
        <link rel="stylesheet" href="css/btnStatic.css">
        <link rel="stylesheet" href="css/fondo.css">
        <title></title>
    </head>
    <body>
        
        <?php
        
        if($_SESSION["admin_code"]!=null){
            if($_SESSION["admin_code"]!= 7788){
            echo"<div class='nav nav-pills'>
            <div class='container'>
                <ul class='pull-left'>
                    <li class='active'><a href='#'>Info </a></li>
                    <!--<li><a href='#'>Mapa </a></li>-->
                </ul>
                <ul class='pull-right'>
                    <li class='dropdown'>
                        <a href='globalView.php' class='dropdown-toggle'>globalview <b class='caret'></b></a>
                        <ul class='dropdown-menu'>
                            <li><a class='sec'>Sectores</a></li>
                            <li><a class='sis'>Sistemas</a></li>
                            <li><a class='sum'>Sumideros</a></li>
                            
                        </ul>
                    </li>
                    <li><a href='construccion.php'>Consultas </a></li>
                    <li><a href='construccion.php'>problemas</a></li>
                    <li><a href='construccion.php'>Filtros</a></li>
                    <li><a href='verificar_logOut.php'>Log Out</a></li>
                </ul>
            </div>
        </div>";
            }else{
            echo"<div class='nav nav-pills'>
            <div class='container'>
                <ul class='pull-left'>
                    <li class='active'><a href='construccion.php'>Info </a></li>
                    <!--<li><a href='#'>Mapa </a></li>-->
                </ul>
                <ul class='pull-right'>
                    <li><a href='welcome_usuario.php'>Home </a></li>
                    <li><a href='verificar_logOut.php'>Log Out </a></li>
                    <li><a href='construccion.php'>Profile</a></li>
                </ul>
            </div>
        </div>";
            }
        }else{
            echo"<div class='nav nav-pills'>
            <div class='container'>
                <ul class='pull-left'>
                    <li class='active'><a href='construccion.php'>Info </a></li>
                    <!--<li><a href='#'>Mapa </a></li>-->
                </ul>
                <ul class='pull-right'>
                    <li><a href='index.php'>Login </a></li> 
                    <li><a href='construccion.php'>Guia </a></li> 
                </ul>
            </div>
        </div>";
        }
        
        ?>
        
        <div class="jumbotron">
            <div class="container">

                <h1>El sitio todavia esta en construccion!</h1>
                <h2>Mienstras! disfruta del resto de la pagina</h2>
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


    </body>
</html>