<?php     
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$consulta="DELETE FROM movies WHERE id='".$id."'";
	$resultado=mysqli_query($conexion,$consulta);
	if ($resultado) {
		echo "<div class='alert alert-success' role='alert'>
		<h4 class='alert-heading'>Eliminado!</h4>
		<p class='alert-heading'>Se ha eliminado la pelicula</p>
		</div>";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="listadepeliculas.js"></script>
	<style>
		.modal-body{
			color: black;
		}
		.btn {
			background-color: DodgerBlue;
  			border: none;
  			color: white;
  			padding: 12px 16px;
  			font-size: 16px;
  			cursor: pointer;
			}

			/* Darker background on mouse-over */
		.btn:hover {
  			background-color: RoyalBlue;
			}
	</style>
	<style >
		#c2{
			display: inline-block;
			background-color: black;
			padding: 10px;

		}
	</style>
	<title>Listado de Peliculas</title>
</head>

<body>
	<div class="container">
		<?php include("menu.php") ?>
		<div class="row">
			<div class="col-12">
				<div>
					<button type="button" id="descargartxt" class="btn btn-primary"><a href="peliculas.txt" download="peliculat">DESCARGAR Listado de peliculas</a></button>
					<button type="button" id="descargarjson" class="btn btn-primary"><a href="pelicula.json" download="peliculat">DESCARGAR Listado de peliculas en json</a></button>
				</div>
				<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Agregar pelicula</button>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Agregar pelicula</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="" method="POST">
									<div class="form-group">
										<label for="">Titulo</label>
										<input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="emailHelp">
									</div>
									<div class="form-group">
										<label for="">Año</label>
										<input type="text" class="form-control" name="anio" id="anio">
									</div>
									<div class="form-group">
										<label for="">Puntaje</label>
										<input type="text" class="form-control" name="puntaje" id="puntaje">
									</div>
									<div class="form-group">
										<label for="">Duracion</label>
										<input type="text" class="form-control" name="duracion" id="duracion">
									</div>
									<div class="form-group">
										<label for="">Genero</label>
										<input type="text" class="form-control" name="genero" id="genero">
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Descripcion</label>
										<textarea class="form-control" name="descripcion" id="descripcion exampleFormControlTextarea1" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label for="exampleFormControlFile1">Imagen</label>
										<input type="file" name="imagen" class="form-control" id="imagen">
									</div>
								<form>

							</div>
							<div class="modal-footer">
								<button type="button" id="cerrar" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" id="guardarpelicula" class="btn btn-primary" >Guardar</button>
							</div>
						</div>
					</div>
				</div>


				

			<table id="grilla-peliculas">
				<tr>
					<th>Titulo</th>
					<th>Imagen</th>
					<th>Año</th>
					<th>Puntaje</th>
					<th>Evaluacion</th>
					<th>Duracion</th>
					<th>Descripcion</th>
					<th>Genero</th>
					<th>Opcion</th>
					
				</tr>
				<?php 
				$pag=5;
				$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
				if (isset($_GET['pagina'])) {
					$pagina=$_GET['pagina'];
				}
				else {
					$pagina=1;
				}
				$comienzo=($pagina-1)*$pag;
				$consulta="SELECT * FROM movies LIMIT $comienzo,$pag ";
				$resultado=mysqli_query($conexion,$consulta);
				?>


				<?php while ($matos=mysqli_fetch_array($resultado)) {
						?>
				<tr>
					<td><p><?php echo $matos['titulo']; ?></p></td>
					<td><img src="<?php echo $matos['imagen']; ?>"width="100px" height="170px"></td>
					<td><p><?php echo $matos['anio']; ?></p></td>
					<td><p><?php echo $matos['puntaje']; 
							$puntaje = $matos['puntaje'];?></p></td>
					<td><p><?php 
							
							$consulta2 = "SELECT fPuntaje($puntaje) As fPuntaje";
							$resultado2=mysqli_query($conexion,$consulta2);
							$matos2=mysqli_fetch_array($resultado2);
								echo $matos2['fPuntaje'];
							
					
					
					?></p></td>
					<td><p><?php echo $matos['duracion']; ?></p></td>
					<td><p><?php echo $matos['descripcion']; ?></p></td>
					<td><p><?php echo $matos['genero']; ?></p></td>
					<td><a href="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $matos['id']; ?>" onclick="eliminar()" >
						<svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
						</svg>
						Eliminar
					</a>
					<br>
					<a href="actualizar.php?id=<?php echo $matos['id']; ?>"  ><svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>Editar</a></td>
				
				<?php } ?>
				</tr>
			</table>
			<nav aria-label="Page navigation example">
					<ul class="pagination">
						<?php
						$consulta="SELECT * FROM movies";
    					$resultado=mysqli_query($conexion,$consulta);
    					$total_reg=mysqli_num_rows($resultado);
    					$total_pag=ceil($total_reg/$pag);

    					for ($i=1; $i <=$total_pag ; $i++) { 
    						echo "<li class='page-item'><a class='page-link' href='listadodepeliculas.php?pagina=".$i."'>".$i." </a></li>";
    					}
    					?>
    						
    				</ul>
    			</nav>
				

			
		<?php include("footer.php") ?>
	</div>
</div>
</div>




    

	
    
</body>
</html>				