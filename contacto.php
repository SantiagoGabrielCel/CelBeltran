<?php     
$conexion=mysqli_connect("localhost:3307","root","root","web_movies");
if (mysqli_connect_errno()) {
  echo "error al conectar a MYSQL";
  exit();
}

$consulta="SELECT * FROM movies";
$as="SELECT * FROM movies";
$carousel=mysqli_query($conexion,$consulta);
$aside=mysqli_query($conexion,$as);
$resultado=mysqli_query($conexion,$consulta);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style >
		#c3{
			display: inline-block;
			background-color: black;
			padding: 10px;

		}
	</style>
	<title>Contacto</title>
</head>

<body>
	<div class="container">
		<?php include("menu.php") ?>
		<div class="row justify-content-center pt-5 mt-5 mr-1 ">
			<div class="col-8 col-md-6 col-sm-8 col-xl-6 col-lg-5 col-">
				<form class="contactoform" action="InsertaContactoSP.php" onsubmit ="ValidacionReg()"method="post">
					<h1 class="text-center">Contacto</h1>
					<div class="form-group mx-sm-4">
						<label class="formulario">Nombre</label>
						<input class="form-control" type="text" name="Nombre" id="Nombre" required>
						<br>
						<label class="formulario">Email</label>
						<input class="form-control" type="Email" name="Email" id="Email" required>
						<br>
						<label class="formulario">Telefono</label>
						<input class="form-control" type="text" name="Telefono" id="Telefono" required>
						<br>
						<label class="formulario">Mensaje</label>
						<textarea placeholder="Mensaje" id="consulta" name="consulta" class="form-control" required></textarea>
						<br>
			
						<input type="submit" value="enviar">
						<br>
					</div>	
				</form>
			
		</div>
	</div>
<?php include("footer.php") ?>
</div>
<script>
	function ValidacionReg(){
		var Nombre,Email,Telefono,Mensaje,sExpresion,sExpresionEmail,sExpresionTel;
		Nombre=document.getElementById("Nombre").value;
		Email=document.getElementById("Email").value;
		Telefono=document.getElementById("Telefono").value;
		Mensaje=document.getElementById("consulta").value;
		
		 sExpresion =/^[a-zA-Z]+/
		 sExpresionEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i
		 
		if (Nombre ==="" || Email ==="" || Telefono==="", Mensaje===""){
			alert("Todos los campos son obligatorios");
			return false;
		}else if(Nombre.length>25){
			alert("El nombre es demasiado largo");
			return false;
		}
		//VALIDACION POR EXPRESION REGULAR //
		else if (!sExpresion.test(Nombre)|| !sExpresionEmail.test(Email)){
			return false;
		}
		else{
			alert("Enviado");
			return true;
		}
	}
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	
	
	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>				