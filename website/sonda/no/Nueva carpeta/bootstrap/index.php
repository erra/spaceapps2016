<!DOCTYPE html> 
<html lang="es"> 
  <head> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!–Con esto garantizamos que se vea bien en dispositivos móviles–> 
    <title>Mi primer proyecto con Booststrap</title> 
 
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> <!–Llamamos al archivo CSS –> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
		<!– Importante llamar antes a jQuery para que funcione bootstrap.min.js   –> 
	<script src="js/bootstrap.min.js"></script> <!– Llamamos al JavaScript de Bootstrap –> 


  </head> 
  <body> 
    <h1>¡Hola mundo!</h1> 
 	<p> Hola a todos desde OpenWebinars.net, mi primera web con Bootsrap ;(</p>	 
    


<form role="form">
  <div class="form-group">
    <label for="ejemplo_email_1">Email</label>
    <input type="email" class="form-control" id="ejemplo_email_1"
           placeholder="Introduce tu email">
  </div>
  <div class="form-group">
    <label for="ejemplo_password_1">Contraseña</label>
    <input type="password" class="form-control" id="ejemplo_password_1" 
           placeholder="Contraseña">
  </div>
  <div class="form-group">
    <label for="ejemplo_archivo_1">Adjuntar un archivo</label>
    <input type="file" id="ejemplo_archivo_1">
    <p class="help-block">Ejemplo de texto de ayuda.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Activa esta casilla
    </label>
  </div>
  <button type="submit" class="btn btn-default">Enviar</button>
</form>


    
    
  </body> 
</html> 