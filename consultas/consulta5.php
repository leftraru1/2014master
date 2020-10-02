
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
    <head>
        <link rel='stylesheet' href='login.css'/>
        <script src='script.js'></script> 
    </head>
    <body>
	
	
	<?php
	$dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7");

	





// muestra los sumideros que tenga un problema de desborde y que no han sido solucionados





	$query = 'SELECT s.id_sumidero, s.calle, s.nro_calle
FROM essbio.sumidero s JOIN essbio.problema p ON p.id_sumidero = s.id_sumidero
WHERE p.id_sumidero = s.id_sumidero AND p.tipo_problema ='desborde' AND p.estado ='sin solucionar'';

			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());


			// Imprimiendo los resultados en HTML
			echo "<table>\n";
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    			echo "\t<tr>\n";
    			foreach ($line as $col_value) {
       				 echo "\t\t<td>$col_value</td>\n";
    			}
    			echo "\t</tr>\n";
			}
			echo "</table>\n";
	
	
	?>
	
    </body>
</html>