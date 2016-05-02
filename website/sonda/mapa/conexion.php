<?php

	require_once('../configdb/controlador.php');

$db = new BaseDatos();

if($db->conectar()){
	
		$consulta = "SELECT 
						  `s`.`nombre_sensor`,
						  `ts`.`nombre_tipo_suelo`,
						  `ts`.`factor_electrolitico`,
						  `m`.`valor_muestra`,
						  `m`.`latitud`,
						  `m`.`longitud`,
						  `m`.`fecha_dato`
						FROM
						  `sensores` `s`
						  RIGHT OUTER JOIN `muestras` `m` ON (`s`.`id_sensor` = `m`.`id_sensor`)
						  LEFT OUTER JOIN `tipos_de_suelo` `ts` ON (`m`.`id_tipo_suelo` = `ts`.`id_tipo_suelo`)
						WHERE
						  `m`.`latitud` = '-33.47302199866159' AND 
						  `m`.`longitud` = '-70.62983129999998'";
	
	
	
        $query = mysql_query($consulta, $db->conectar);
		
        if ($query == 0){
			 echo "Sentencia incorrecta llamado a tabla: $tabla.";
		}
		else {
            $nregistrostotal = mysql_result($query, 0, 0);
        }
	
	
	
//    $db->desconectar();
}

%>