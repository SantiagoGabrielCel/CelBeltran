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
	<title>Index</title>
	<style >
		#c1{
			display: inline-block;
			background-color: black;
			padding: 10px;

		}
	</style>
</head>

<body>
	<div class="container">
		<?php include("menu.php") ?>
		<div class="row">
			<div class="col-6 col-lg-6">
				<?php 
			$a = [];
			while ($datos=mysqli_fetch_row($carousel)){
				array_push($a,$datos);

			}
			?>
			<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  				</ol>
  				<div class="carousel-inner">
    				<div class="carousel-item active" >
      					<img src="<?php echo $a[0][7]; ?>" class="d-block w-100">
      					<div class="carousel-caption d-none d-md-block">
        					
      					</div>
    				</div>
    				<div class="carousel-item">
      					<img src="<?php echo $a[1][7]; ?>" class="d-block w-100" >
      					<div class="carousel-caption d-none d-md-block">
        					
      					</div>
    				</div>
    				<div class="carousel-item">
      					<img src="<?php echo $a[2][7]; ?>" class="d-block w-100" >
      					<div class="carousel-caption d-none d-md-block">
        					
      					</div>
    				</div>
  				</div>
  				<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    				<span class="sr-only">Previous</span>
  				</a>
  				<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    				<span class="carousel-control-next-icon" aria-hidden="true"></span>
    				<span class="sr-only">Next</span>
  				</a>
			</div>
		</div>
		<div class="col-lg-6">
			<button class="btn btn-primary btn-lg btn-block" id="mostrar">ver destacados</button>
			<aside id="masvisto">
				<h3>Lo Mas Visto</h3>
				<?php for ($i=3; $i < 6; $i++) { 
					?>
					<div class="card mb-3" style="max-width: 700px;">
						<div class="row no-gutters">
						<div class="col-md-4">
							<img src="<?php echo $a[$i][7]; ?>"width="180px" height="180px">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?php echo $a[$i][1]; ?></h5>
        						<p class="card-text"><?php echo $a[$i][5]; ?></p>
        						<p class="card-text"><?php echo $a[$i][2]; ?></p>
        						<p class="card-text"><small class="text-muted"><?php echo $a[$i][3]; ?></small></p>
      						</div>
    					</div>
  					</div>
				</div>
			<?php } ?>

					<button class="btn btn-primary btn-lg btn-block" id="ocultar">Ocultar destacados</button>
			</aside>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h3>Destacado</h3>
			<div class="card-group">
				<?php for ($i=0; $i < 5; $i++) { 
					?>
				<div class="card">
					<img src="<?php echo $a[$i][7]; ?>"width="180px" height="250px" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?php echo $a[$i][1]; ?></h5>
						<p class="card-text"><?php echo $a[$i][5]; ?></p>
						<p class="card-text"><?php echo $a[$i][6]; ?></p>
					</div>
					<div class="card-footer">
						<small class="text-muted">Last updated 3 mins ago</small>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="row">
			<div class="col-lg-12">
				<?php include("footer.php") ?>
			</div>
		</div>
</div>






	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js" ></script>
    <script>
    	$(document).ready(function(){
    		$('#masvisto').hide();
		$("#mostrar").on( "click", function() {
			$('#masvisto').show();
			$("#mostrar").hide();
		 });
		$("#ocultar").on( "click", function() {
			$('#masvisto').hide();
			$("#mostrar").show();
		});
	});
    	
    </script>

</body>
</html>