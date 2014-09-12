@extends('layouts/pruebas')


@section('scripts')
  <script type="text/javascript">
 
$('document').ready(function(){

	$('#generar').click(function(){

		console.log("entroa la funcion");
	  
	  
	  var tabla   = document.createElement("table");
	  var tblBody = document.createElement("tbody");
	  var cont = 1;
	  // Crea las celdas
	  for (var i = 0; i < 10; i++) {
	    // Crea las hileras de la tabla
	    var hilera = document.createElement("tr");
	    if(i % 2 == 0){
	    	hilera.style.backgroundColor="#ffffff";
	    }
	    else{
	    hilera.style.backgroundColor="#b9c1d4";
	 	}
	    for (var j = 0; j < 10; j++) {
	      // Crea un elemento <td> y un nodo de texto, haz que el nodo de
	      // texto sea el contenido de <td>, ubica el elemento <td> al final
	      // de la hilera de la tabla
	      var celda = document.createElement("td");
	      //PARA MAS INFORMACION ESTA LINEA
	      //var textoCelda = document.createTextNode("Fila "+i+", Columna "+j +"TIENE EL:"+cont);
	      var textoCelda = document.createTextNode(cont);
	      celda.appendChild(textoCelda);
	      hilera.appendChild(celda);
	      cont = cont + 1;
	    }
	 
	    // agrega la hilera al final de la tabla (al final del elemento tblbody)
	    tblBody.appendChild(hilera);
	  }
	 
	  // posiciona el <tbody> debajo del elemento <table>
	  tabla.appendChild(tblBody);
	  // appends <table> into <body>
	  $('#matriz').html(tabla);
	  // modifica el atributo "border" de la tabla y lo fija a "2";
	  tabla.setAttribute("border", "2");


	});

});

</script>
@endsection




<div id="matriz" >
	


</div>

<button id="generar" type="button" value="generar Tabla" class="btn btn-lg btn-primary btn" onclick=("generar_matriz()") >Generar tabla</button>

