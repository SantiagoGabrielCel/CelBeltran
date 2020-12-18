<?php
$Nombre=$_POST["Nombre"];
$Email=$_POST["Email"]; 
$Telefono=$_POST["Telefono"];
$Mensaje =$_POST["consulta"];

$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
	echo "error al conectar a MYSQL";
	exit();
}


$rs = $conexion->query( "CALL sp_InsertaContacto('".$Nombre."','".$Email."','".$Telefono."','".$Mensaje."')" );
if($rs){
	echo "ENTRO";
}
else{
	echo "fallo";
}
header("Location: index.php");
?>
