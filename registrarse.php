<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login.css">
	<script src="Validacion.js"></script>
	<title>Login</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-center pt-5 mt-5 mr-1 ">
			<div class="col-8 col-md-6 col-sm-8 col-xl-6 col-lg-5 col-">
				<form action="registro.php" method="post" onsubmit="return validacion();">
					<div class="form-group mx-sm-4">
						<h1 class="text-center">Registro</h1>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
						<br>
						
						<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
						<br>
						
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
						<br>
						<input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña">
						<br>
						<input type="submit" class="btn btn-block btn-danger" value="Registrarse">
						<br>
					</fieldset>
				</form>
			</div>
			
		</div>

	</div>
	
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap/js/bootstrap.min.js" ></script>

</body>
</html>