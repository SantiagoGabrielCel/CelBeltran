var peticion = new XMLHttpRequest();
peticion.open('POST','peli.php');
peticion.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		var myArr = JSON.parse(this.responseText);
		myArr.forEach(pelicula=>{
			var elemento = document.createElement('tr');
    		elemento.innerHTML +=("<td>"+pelicula.titulo +"</td>");
    		elemento.innerHTML +=("<td>"+pelicula.imagen +"</td>");
    		elemento.innerHTML +=("<td>"+pelicula.anio +"</td>");
    		elemento.innerHTML +=("<td>"+pelicula.puntaje +"</td>");
    		elemento.innerHTML +=("<td>"+pelicula.duracion +"</td>");
    		elemento.innerHTML +=("<td>"+pelicula.descripcion +"</td>");
    		elemento.innerHTML +=("<td>"+pelicula.genero +"</td>");
    		document.getElementById('grilla-peliculas').appendChild(elemento);
    	})
	}
};

peticion.send();
