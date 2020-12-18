<?php     
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}

$titulo = $_POST['titulo'];
$anio = $_POST['anio'];
$puntaje = $_POST['puntaje'];
$duracion= $_POST['duracion'];
$genero =$_POST['genero'];
$descripcion =$_POST['descripcion'];
$imagen=$_POST['imagen'];
$imagen = "pelicula/".substr($imagen,11);



$consulta="INSERT INTO movies(titulo,anio,puntaje,duracion,genero,descripcion,imagen)VALUES('".$titulo."','".$anio."','".$puntaje."','".$duracion."','".$genero."','".$descripcion."','".$imagen."')";

$resultado=mysqli_query($conexion,$consulta);
$fila=mysqli_num_rows($resultado);

if ($resultado) {
	$data=1;

}

$nombre=$_POST['imagen'];
$guardado=$_POST['imagen'];

if(!file_exists('pelicula')){
mkdir('pelicula',0777,true);
if(file_exists('pelicula')){
if(move_uploaded_file($guardado, 'pelicula/'.$nombre)){
	echo "Archivo guardado con exito";
	}else{
		echo "Archivo no se pudo guardar";
	}
}
}else{
if(move_uploaded_file($guardado, 'pelicula/'.$nombre)){
		echo "Archivo guardado con exito";
}else{
		echo "Archivo no se pudo guardar";
	}
}




?>


	