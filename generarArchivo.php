<?php     
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}


mysqli_set_charset($conexion, "utf8");
$consulta="SELECT * FROM movies";
$resultado=mysqli_query($conexion,$consulta);


$file = fopen("peliculas.txt", "w");

while ($datos=mysqli_fetch_array($resultado)) {
	fwrite($file,"Pelicula Numero:". $datos['id'] . "|");
	fwrite($file, "Titulo: ".$datos['titulo'] . "|");
	fwrite($file, "Año: ".$datos['anio'] . "|");
	fwrite($file, "Puntaje ".$datos['puntaje'] . "|");
	fwrite($file, "Descripcion: ".$datos['descripcion'] . "|");
	fwrite($file, "Genero: ".$datos['genero'] . "|".PHP_EOL);
	//fwrite($file, "---------------------------------------------------------------------------". PHP_EOL);
}

fclose($file);

  header('Content-Disposition: attachment; filename="peliculas.txt.csv"');
  readfile("peliculas.txt");
?>