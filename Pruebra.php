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
    <script src="listadepeliculas.js"></script>
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
								<form action="" method="POST" enctype="multipart/form-data">
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
										<input type="file" name="imagen" class="form-control" id="imagen" accept=".png, .jpg, .jpeg" >
									</div>
								<form>

							</div>
							<div class="modal-footer">
								<button type="button" id="cerrar" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" id="guardarpelicula" class="btn btn-primary">Guardar</button>
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
					<th>Duracion</th>
					<th>Descripcion</th>
					<th>Genero</th>
					<th>Opcion</th>
				</tr>
				<tbody id="lista"></tbody>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						
    						
    				</ul>
    			</nav>

			</table>

			
		<?php include("footer.php") ?>
	</div>
</div>
</div>




    

	
    
</body>
</html>				