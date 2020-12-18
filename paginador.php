<?php
$consulta="SELECT * FROM movies";
$resultado=mysqli_query($conexion,$consulta);
$total_reg=mysqli_num_rows($resultado);
$total_pag=ceil($total_reg/$pag);

for ($i=1; $i <=$total_pag ; $i++) { 
echo "<li class='page-item'><a class='page-link' href='listadodepeliculas.php?pagina=".$i."'>".$i." </a></li>";
  }
    					?>