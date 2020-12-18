<?php
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
	echo "error al conectar a MYSQL";
	exit();
}

//$sql ="call sp_in_login('Santi', 'admin2n', @f)";
//echo $sql;

$Nombre ="Santi";
$Email ="Admin";
$Telefono ="Admin";
$Mensaje ="Admin";
$rs = $conexion->query( "CALL sp_InsertaContacto('".$Nombre."', '".$Email."', '".$Telefono."','".$Mensaje."')" );
if ($rs){
	echo "hola";
	
}

//$consulta = mysqli_prepare($conexion, "CALL sp_in_login(?,?,@f)");
//mysqli_stmt_bind_param($consulta, "ss", $ejemplo,$ejemplo2);
//mysqli_stmt_execute($consulta);
//mysqli_stmt_close($consulta);
//$consulta = mysqli_query($conexion,'SELECT @f');
//list($salida) = mysqli_fetch_row($result);
//mysqli_free_result($result);




//while($row = $rs->fetch_object())
//{
////debug($row);
//}






//if($output = 1){
//		echo"pincho";
//}else{
//	$data = 1;
//	echo $data ."\n";
//	echo "Operación realizada exitosamente.";
//}



//$resul = $conexion->query("call sp_in_login('Santi', 'Ad2min', @f) ");
//$res1 = $conexion->query('SELECT @f');
//$result = mysqli_fetch_assoc($res1);
//$f     = $result['@f'];
//echo $f ;
//
//
//if($resul != 1){
//	$data = 1;
//	echo $data ."\n";
//	echo "Operación realizada exitosamente.";
//}else{
//	echo "Fallo";
//}













//$consulta="SELECT * FROM USERS WHERE USUARIO='$usuario' AND contrasenia='$contraseña'";
//$resultado=mysqli_query($conexion,$consulta);
//$fila=mysqli_num_rows($resultado);

//if($fila==1){
//	$data=mysqli_fetch_array($resultado);
//	echo "1";
//}else{
//	echo "fd";
	


?>