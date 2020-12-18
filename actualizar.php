<?php     
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}
$id = $_GET['id'];
$consulta="SELECT * FROM movies WHERE id='".$id."'";
$resultado=mysqli_query($conexion,$consulta);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		label,h2{color:white;}
	</style>
	<title>Index</title>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center pt-5 mt-5 mr-1 ">
			<div class="col-8 col-md-6 col-sm-8 col-xl-6 col-lg-5 col-">
				<?php while ($datos=mysqli_fetch_array($resultado)) {
						?>
						<form  action="actualizarbd.php" method="get">
							<h2>Actualizar pelicula: <?php echo $datos['titulo']; ?> </h2>
							<div class="form-group">
								<label for="">id</label>
								<input type="text" class="form-control" name="id" id="" aria-describedby="emailHelp" value="<?php echo $datos['id']; ?>">
							</div>
							<div class="form-group">
								<label for="">Titulo</label>
								<input type="text" class="form-control" name="titulo" id="" aria-describedby="emailHelp" value="<?php echo $datos['titulo']; ?>">
							</div>
							<div class="form-group">
								<label for="">Año</label>
								<input type="text" class="form-control" name="anio" id=""value="<?php echo $datos['anio']; ?>">
							</div>
							<div class="form-group">
								<label for="">Puntaje</label>
								<input type="text" class="form-control" name="puntaje" id=""value="<?php echo $datos['puntaje']; ?>">
							</div>
							<div class="form-group">
								<label for="">Duracion</label>
								<input type="text" class="form-control" name="duracion" id=""value="<?php echo $datos['duracion']; ?>">
							</div>
							<div class="form-group">
								<label for="">Genero</label>
								<input type="text" class="form-control" name="genero" id=""value="<?php echo $datos['genero']; ?>">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Descripcion</label>
								<textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3" ><?php echo $datos['descripcion']; ?></textarea	>
							</div>
							<button type="submit" onclick="actualizado()" class="btn btn-primary">Guardar</button>
							<button class="btn btn-primary"><a href="listadodepeliculas.php">Volver</a></button>
							<form>
							<?php } ?>
						</div>
					</div>
				</div>
				<script>
					function actualizado(){
						alert("se ha actualizado la pelicula");
					}
				</script>






	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>				
										






</html>				
										






										





