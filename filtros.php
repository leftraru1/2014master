<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<html>
    <head>
        <link rel='stylesheet' href='login.css'/>
        <script src='script.js'></script> 
    </head>
    <body>
	
	
	<?php
	$dbconn = pg_connect("host=plop.inf.udec.cl port=5432 dbname=BDI-g user=BDI-7 password=bdi7");

	
	echo "Alertas emitidas por sumidero";



	$query = 'SELECT s.id_sumidero, a.tipo_problema
	FROM essbio.alerta a, essbio.sumidero s
	WHERE a.id_sumidero = s.id_sumidero';
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

			echo "<table>\n";
			echo"\t<tr>\n";
				echo"\t<td><strong>ID sumidero</strong></td>\n";
				echo"\t<td><strong>tipo problema</strong></td>\n";
			echo"\t</tr>\n";
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    			echo "\t<tr>\n";
    			foreach ($line as $col_value) {
       				 echo "\t\t<td>$col_value</td>\n";
    			}
    			echo "\t</tr>\n";
			}
			echo "</table>\n";?>
			
			<HR width=30% align="left">
<?php
	echo "Alertas que generaron un problema";
	$query = 'SELECT a.id_problema, a.tipo_problema
	FROM essbio.alerta a, essbio.sumidero s, essbio.problema p
	WHERE a.id_sumidero = s.id_sumidero AND p.id_problema = a.id_problema';
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

			echo "<table>\n";
			echo"\t<tr>\n";
				echo"\t<td><strong>ID problema</strong></td>\n";
				echo"\t<td><strong>tipo problema</strong></td>\n";
			echo"\t</tr>\n";
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    			echo "\t<tr>\n";
    			foreach ($line as $col_value) {
       				 echo "\t\t<td>$col_value</td>\n";
    			}
    			echo "\t</tr>\n";
			}
			echo "</table>\n";
?>
<HR width=30% align="left">

	
		
	<?php		
	echo " Cantidad de problemas vigente como no vigentes por sector.";


		$query = 'SELECT se.num_sector,Count(p.id_problema)
		FROM essbio.sector se, essbio.sistema si, essbio.sumidero su,  essbio.alerta a, essbio.problema p
		WHERE si.num_sector = se.num_sector AND su.num_sistema = si.num_sistema AND
		a.id_sumidero = su.id_sumidero AND p.id_problema = a.id_problema
		GROUP BY se.num_sector';
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

			echo "<table>\n";
			echo"\t<tr>\n";
				echo"\t<td><strong>Sector</strong></td>\n";
				echo"\t<td><strong>problemas</strong></td>\n";
			echo"\t</tr>\n";
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    			echo "\t<tr>\n";
    			foreach ($line as $col_value) {
       				 echo "\t\t<td>$col_value</td>\n";
    			}
    			echo "\t</tr>\n";
			}
			echo "</table>\n";
			
			?>
			<HR width=30% align="left">
<?php
			echo " Cantidad de alertas emitidas por ciudadano.";




		$query = 'SELECT c.nombre, COUNT(a.id_mensaje)
		FROM essbio.ciudadano c, essbio.alerta a
		WHERE a.rut_ciudadano = c.rut 
		GROUP BY c.rut';
			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

			echo "<table>\n";
			echo"\t<tr>\n";
				echo"\t<td><strong>Ciudadano</strong></td>\n";
				echo"\t<td><strong>Alertas </strong></td>\n";
			echo"\t</tr>\n";
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    			echo "\t<tr>\n";
    			foreach ($line as $col_value) {
       				 echo "\t\t<td>$col_value</td>\n";
    			}
    			echo "\t</tr>\n";
			}
			echo "</table>\n";
			
?>		
	<HR width=30% align="left">
						<?php
						echo "Sumideros que tengan un problema de desborde y que no han sido solucionados";
		
		$query = "SELECT s.id_sumidero, s.calle, s.nro_calle
		FROM essbio.sumidero s JOIN essbio.problema p ON p.id_sumidero = s.id_sumidero
		WHERE p.id_sumidero = s.id_sumidero AND p.tipo_problema ='desborde' AND p.estado ='sin solucionar'";

			$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

			echo "<table>\n";
			echo"\t<tr>\n";
				echo"\t<td><strong>ID sumidero</strong></td>\n";
				echo"\t<td><strong>calle</strong></td>\n";
				echo"\t<td><strong>N°</strong></td>\n";
			echo"\t</tr>\n";
			while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    			echo "\t<tr>\n";
    			foreach ($line as $col_value) {
       				 echo "\t\t<td>$col_value</td>\n";
    			}
    			echo "\t</tr>\n";
			}
			echo "</table>\n";
	
	
	?>
		<HR width=30% align="left">
    </body>
</html>