$(document).ready(function(){
	
	$('#guardarpelicula').click(function(i){
		let dato ={
			titulo: $("#titulo").val(),
  	        anio: $("#anio").val(),
  	        puntaje:$("#puntaje").val(),
  	        duracion:$("#duracion").val(),
  	        descripcion:$("#descripcion").val(),
  	        genero:$("#genero").val(),
            imagen:$("#imagen").val()

		}
		$.post('go.php',dato,function(respuesta){
      console.log(dato);
			alert("se guardo la pelicula");
		});
  		i.preventDefault();
  	});


  $('#descargartxt').click(function(){
    $.ajax({
          url: 'generarArchivo.php',
          type : 'POST',
          success: function(data) {
            alert("descargado");
          }
        });
    });
  
  $('#descargarjson').click(function(){
    $.ajax({
          url: 'generarArchivoJson.php',
          type : 'POST',
          success: function(data) {
            alert("descargado json");
          }
        });
    });

 	   

});


