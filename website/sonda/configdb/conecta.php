<?php

$idInsertado = 0;

function conectar(){

		$ip = recuperaip();
		if($ip == "200.63.98.212"){	
			$host 		= "localhost"; //revisar si es el ip o localhost
			$usuario 	= "rodrigo_tesis";
			$pws		= "93539514tesis";
			$db_name	= "rodrigo_db_ingecheck";
			$laconexion = "Conexi&oacute;n Web<br>IP : ".$ip."<br>";
		}
		else{
			$host 		= "localhost"; 
			$usuario 	= "root";
			$pws		= "93539514";
			$db_name	= "db_sonda";
			$laconexion = "Conexi&oacute;n Local<br>IP : ".$ip."<br>";
		}
		
//echo "<br>".$laconexion. "<hr>";
		
		$conexion = mysqli_connect($host,$usuario,$pws,$db_name);
		
		if(!$conexion){//manejo de errores
			echo "<br><br><div class='error'>";
				die('conexion error : '.mysqli_connect_errno());
			echo "</div>";
			return false;
		}
		else
			return $conexion;
}
	
function desconectar($conexion){
	mysqli_close($conexion);
}

function consulta($consulta){
	global $idInsertado;
		
	$conexion 	 = conectar();
		
	$resultado 	 = mysqli_query($conexion,$consulta);

	$idInsertado = (int) mysqli_insert_id($conexion);

	
	desconectar($conexion);
	
	if(!$resultado){//manejo de errores
			echo "<br><br><div class='error'>";
				printf("ERROR EN LA CONSULTA :  %s\n", mysqli_error($conexion));
			echo "</div>";
			return false;
	}
	
	return $resultado;	
	
	exit();
	
}

function consulta_lista($consulta){
	global $idInsertado;
		
	$conexion = conectar();
		
	$resultado = mysqli_query($conexion,$consulta);
	
	$idInsertado	= (int) mysqli_insert_id($conexion);	
	
	if(!$resultado){
		echo "<br><br><div class='error'>";
			printf('ERROR EN LA CONSULTA :  %s  ', mysqli_connect_errno() );
		echo "</div>";
			return false;
	}
	else{
		if(numero_filas($resultado)>0){
			return $resultado;
		}
		else{
			return false;
		}
	}

	exit();
	
}

// * Recoge el id del último registro insertado de la última consulta
function ultimoID(){
	global $idInsertado;
		return $idInsertado;// (int) mysqli_insert_id($conexion);
	}

function numero_filas($resultado){

	return (int) @mysqli_num_rows($resultado);

}

function fetch_array($resultado){
	return mysqli_fetch_array($resultado);
}

function ultimo_id(){
	$conexion = conectar();	
	return mysql_insert_id($conexion);	
}

function recuperaip() {
	
	return $_SERVER['SERVER_ADDR'];//ip del servidor

    if (!empty($_SERVER['HTTP_CLIENT_IP']))

        return $_SERVER['HTTP_CLIENT_IP'];

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))

        return $_SERVER['HTTP_X_FORWARDED_FOR'];

    return $_SERVER['REMOTE_ADDR'];

}


?>