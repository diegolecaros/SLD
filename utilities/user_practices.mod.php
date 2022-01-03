<?php
	//Creando objeto SQL
	$sql = new SQL();
	
	//Conectando con el servidor
	$sql->SQLConnection();
	
	//Creando consulta
	//$query = "SELECT pname, pcname FROM sld_practices_data WHERE type='Simulada'";
	
	$query1 = "SELECT DISTINCT categoria FROM sld_practices_data WHERE categoria IS NOT NULL ORDER BY id ASC";
	
	
	//Ejecutando consulta
	
	
	$result1 = $sql->SQLQuery($query1);
	$numcat= $sql->count;
	
	$strHTML = "";
	for($i=0; $i < $numcat; $i++) {
		//$strHTML .= "<li class=\"practice\"><a href=\"practices/".$result[$i]['pname'].".php\" class=\"ast1\">".tildes($result[$i]['pcname'])."</a></li>";
		$cat= $result1[$i]['categoria'];
		$strHTML .= "<h1 class=\"content_r_hst2\">".$cat."</h1>";
		
		$query = "SELECT pname, pcname FROM sld_practices_data WHERE visibilidad='visible' AND categoria='".$cat."' ORDER BY id";

		$conta = 0;
				
		$result = $sql->SQLQuery($query);
		$numpract= $sql->count;
		$strHTML .= "<table class=\"table table-bordered table-hover tsize\">
						<thead>
							<tr class=\"bg-dark\">
								<th class=\"col-sm-1\" style=\"color:whitesmoke;\" scope=\"col\">N°</th>
								<th class=\"col-sm-10\" style=\"color:whitesmoke;\" scope=\"col\">Práctica</th>
							</tr>
						</thead>
						<tbody>
		
							";
		for($j=0; $j < $numpract; $j++) {
			$conta++;
			$strHTML .= "<tr>
							<th>$conta</th>
							<td><a href=\"practices/".$result[$j]['pname'].".php\" class=\"ast1\">".tildes($result[$j]['pcname'])."</a></td>
						</tr>";
			}
		$strHTML .= "</tbody>
					
					</table>";
	}//end for
	
	
	include('setonline.mod.php');
?>