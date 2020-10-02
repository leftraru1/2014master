
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
    <head>
        <link rel='stylesheet' href='login.css'/>
        <script src='script.js'></script> 
    </head>
    <body>
	
	
	<?php
	$dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7");

	



// Muestra la cantidad de alertas por ciudadano.




	$query = 'SELECT c.nombre, COUNT(a.id_mensaje)
FROM essbio.ciudadano c, essbio.alerta a
WHERE a.rut = c.rut 
GROUP BY c.rut
';
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