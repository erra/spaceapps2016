<?php

	require_once('../configdb/conecta.php');


	$sonda 	= $_GET['sonda'];
	$lat 	= $_GET['la'];
	$lon 	= $_GET['lo'];
	
	echo "<b>Información " . $sonda . "</b><br>";;
	

		$sql = "SELECT 
						  `s`.`nombre_sensor`,
						  `ts`.`nombre_tipo_suelo`,
						  ROUND(`m`.`valor_muestra`,2) AS valor_muestra,
						  `s`.`unidad_medida`,
						  `m`.`latitud`,
						  `m`.`longitud`,
						  `m`.`fecha_dato`
						FROM
						  `sensores` `s`
						  RIGHT OUTER JOIN `muestras` `m` ON (`s`.`id_sensor` = `m`.`id_sensor`)
						  LEFT OUTER JOIN `tipos_de_suelo` `ts` ON (`m`.`id_tipo_suelo` = `ts`.`id_tipo_suelo`)
						WHERE
						  `m`.`latitud` = '$lat' AND 
						  `m`.`longitud` = '$lon'
						ORDER BY
						   `s`.`orden`,
						   `m`.`fecha_dato` DESC";
						  
						//  echo $sql;
	

                $consulta = consulta_lista($sql);
				if($consulta){
?>
	<div>
        <table cellpadding="0" cellspacing="0">

<?php				
					$i = 0;	
                    while($rs = fetch_array($consulta) ){
						$color = "#ffffff";
						if($i++ % 2) $color = "#E5E2E2";
					
?>					
            <tr style="background-color:<?=$color?>"><td><?=$rs['nombre_sensor']?></td><td>:</td><td align="right"><?=$rs['valor_muestra']?><?=$rs['unidad_medida']?></td></tr>
<?php
					}
?>            
            <tr><td colspan=3 align="center">&nbsp;</td></tr>
            <tr><td colspan=3 align="center"><a href="analisis.php">Ver an&aacute;lisis</a></td></tr>
        </table>
	</div>					

<?php					
					
				}
				else{
					echo "ALGO HUELE MAL";
				}
?>
