<?php     
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}
$id = $_POST['id'];
$consulta="DELETE FROM movies WHERE id='".$id."'";
$resultado=mysqli_query($conexion,$consulta);

if ($resultado) {
	echo "bien";
}
?>