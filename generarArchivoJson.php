<?php     
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}


mysqli_set_charset($conexion, "utf8");
$consulta="SELECT * FROM movies";
$resultado=mysqli_query($conexion,$consulta);



while ($matos=mysqli_fetch_array($resultado)) {
	$pelicula[]=array(
		'id'=>$matos['id'],
		'titulo'=>$matos['titulo'],
		'imagen'=>$matos['imagen'],
		'anio'=>$matos['anio'],
		'puntaje'=>$matos['puntaje'],
		'duracion'=>$matos['duracion'],
		'descripcion'=>$matos['descripcion'],
		'genero'=>$matos['genero']
	);
	
};
	
$fp = fopen('pelicula.json', 'w');
fwrite($fp, json_encode($pelicula));
fclose($fp);
?>