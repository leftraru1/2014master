
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
    <head>
        <link rel='stylesheet' href='login.css'/>
        <script src='script.js'></script> 
    </head>
    <body>
	
	
	<?php
	$dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7");

	


// Muestra la cantidad de problemas vigente como no vigentes por sector




	$query = 'SELECT se.num_sector,Count(p.id_problema)
FROM essbio.sector se, essbio.sistema si, essbio.sumidero su,  essbio.alerta a, essbio.problema p
WHERE si.num_sector = se.num_sector AND su.num_sistema = si.num_sistema AND
a.id_sumidero = su.id_sumidero AND p.id_problema = a.id_problema
GROUP BY se.num_sector';
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