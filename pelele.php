<?php     
header('Content-type:application/json');
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}

if (isset($_REQUEST['pos']))
  $inicio=$_REQUEST['pos'];
else
  $inicio=0;


mysqli_set_charset($conexion, "utf8");
$consulta="SELECT * FROM movies limit $inicio,3";
$resultado=mysqli_query($conexion,$consulta);


$pelicula=array();

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

if ($inicio==0)
  echo "anteriores ";
else
{
  $anterior=$inicio-3;
  echo "<a href=\"pelele.php?pos=$anterior\" id=\"ant\">Anteriores </a>";
}
if ($impresos==3)
{
  $proximo=$inicio+3;
  echo "<a href=\"pelele.php?pos=$proximo\" id=\"sig\">Siguientes</a>";
}
else
  echo "siguientes";
?>
echo json_encode($pelicula);
?>








				
 


			
