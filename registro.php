<?php
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$contraseña=$_POST["contraseña"]; 

$conexion=mysqli_connect("localhost","root","","web_movies");
if (mysqli_connect_errno()) {
	echo "error al conectar a MYSQL";
	exit();
}

$agregar="INSERT INTO USERS VALUES('".$usuario."','".$contraseña."','".$nombre."','".$apellido."') ";

$usuarioexistente="SELECT * FROM USERS WHERE USUARIO='$usuario'";
$resultado=mysqli_query($conexion,$usuarioexistente);

if (mysqli_num_rows($resultado)>0) {
	echo "<div class='alert alert-warning' role='alert'>El usuario ya se encuentra registrado!</div>";
	echo "<a href='registrarse.php' class='btn btn-primary'>Volver</a>";
}else{
	$resultado=mysqli_query($conexion,$agregar);
	echo "<div class='alert alert-success' role='alert'>Usted ha sido registrado!</div>";
	echo "<br>";
	echo "<a href='login.html' class='btn btn-primary'>Volver al login</a>";

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<title>Error</title>
</head>
<body>

	<script src="bootstrap/js/bootstrap.min.js" ></script>

</body>
</html>