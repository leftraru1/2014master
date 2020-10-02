<?php  

    function rand_numSector(){
        return rand(1,4);
    }

    function rand_puntoDescarga($num_sector){
        $string;
        if($num_sector == 1){
            $string= "Bio-Bio";
        }else if($num_sector ==2){
            $string="Laguna tres pascualas";
        }else if($num_sector == 3){
            $string="Laguna Lo Mendez";

        }else{
            $string= "Laguna Lo Galindo";
        }
        return $string;

    }

    function randIdSumidero(){
    	$idSumidero = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    	return $idSumidero;
    }
    function randNroCalle(){
    	$nroCalle = rand(0,9).rand(0,9);
    }

   

    $dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7")
    or die('No se ha podido conectar: ' ); 

    $count_sistema =0;
    $calles = array(100,100,200,200,300,300,400,400,500,500);
    for ($i = 1; $i < 5; $i++) {
    
        for($j =0; $j < 5; $j++){
            $nombreSistema = $i . "." . $j;
            $puntoDescarga = rand_puntoDescarga($i);
            $query =    "INSERT INTO essbio.sistema (num_sistema, num_sector, nombre_sistema, punto_descarga) 
                        VALUES ($count_sistema, $i, '$nombreSistema', '$puntoDescarga')";
  
        	$result = pg_query($query) or die('El registro fallo: ' . pg_last_error()); 
        	for($z=0 ; $z<10;$z++){
        		$calle = $nombreSistema;
        		$randNro = rand(0,99);
        		$nroCalle = $calles[$z] + $randNro;
        		$idSumidero =randIdSumidero();
        		
        		$query =    "INSERT INTO essbio.sumidero (id_sumidero, estado, num_sistema, calle, nro_calle) 
                        	VALUES ($idSumidero, 'sin problemas', $count_sistema , '$calle', $nroCalle )";
  
        	$result = pg_query($query) or die('El registro fallo: ' . pg_last_error()); 
        	} 
        //$randSector = rand(1,4);
        echo" Sector: ";
        echo($i);
        echo" Sistema: ";
        echo($j);
        echo" Nombre Sistema: ";
        echo $i . "." . $j;
        echo" punto de descarga: ";
        echo(rand_puntoDescarga($i));
        echo "<br>";

        $count_sistema++;
        }
    } 
         
      
    

    
  
    
    
?>