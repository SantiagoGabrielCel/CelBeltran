<?php     
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}

$id = $_GET['id'];
$titulo = $_GET['titulo'];
$anio = $_GET['anio'];
$puntaje = $_GET['puntaje'];
$duracion= $_GET['duracion'];
$genero =$_GET['genero'];
$descripcion =$_GET['descripcion'];


$consulta="UPDATE movies SET titulo='".$titulo."',anio='".$anio."',puntaje='".$puntaje."',duracion='".$duracion."',genero='".$genero."',descripcion='".$descripcion."' WHERE id='".$id."' " ;
$resultado=mysqli_query($conexion,$consulta);

if ($resultado) {
	header("Location:listadodepeliculas.php");

}

?>