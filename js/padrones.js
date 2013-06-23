$(document).on("ready", inicio);
$("#buscar_grupo a").on("click", cargar_datos);
$("#mostrar_entre a").on("click", cargar_datos);
$("#mostrar_entre input").keyup(function(event){
    if(event.keyCode == 13){
        $("#mostrar_entre a").click();
    }
});
$("#prependedDropdownButton").keyup(function(event){
    if(event.keyCode == 13){
        cargar_datos();
    }
});
$("#mostrar_todos").on("click", cargar_datos);
$("#ordenes a").on("click", cargar_datos);
$("#radios button").on("click", cargar_datos);
$("#borrar_filtro").on("click", cargar_datos);
$('#prependedDropdownButton').typeahead({

    source: function (query, process) {
    	console.log(query);
        return $.getJSON(
            'api.php',
            { query: query },
            function (data) {
            	console.log(data);

    var newData = [];

    $.each(data, function(){

        newData.push(this.apellido);
        newData.push(this.nombres);
        newData.push(this.clase);
        newData.push(this.domicilio);
        newData.push(this.matricula);

    });

    return process(newData);
            });
    }

});
var data_actual;
data_actual = {order: "id", order2: "asc", limit:"0,30"};
function cargar_datos (info) {
	var data,
		valor,
		tipo;
		console.log(info);
		error = false;

		orden2 = $("#radios .active").text();
		if(orden2 == "Ascendente"){
			orden2 = "asc"
		}
		if(orden2 == "Descendente"){
			orden2 = "desc"
		}

		valor = $("#prependedDropdownButton").val();

	if(valor){
		if(info){


		tipo = info.currentTarget.text;

		if(tipo == "Apellido"){
			data = data_actual;
			data.buscar = "";
			data.where  = "apellido";
			data.like = valor;
			data.order2 = orden2;
		}
		if(tipo == "Nombre"){
			data = data_actual;
			data.buscar = "";
			data.where  = "nombres";
			data.like = valor;
			data.order2 = orden2;		}	
		if(tipo == "Calle"){
			data = data_actual;
			data.buscar = "";
			data.where  = "domicilio";
			data.like = valor;
			data.order2 = orden2;		}		
		if(tipo == "Clase"){
			data = data_actual;
			data.buscar = "";
			data.where  = "clase";
			data.es = valor;
			data.order2 = orden2;		}	
		if(tipo == "DNI"){
			data = data_actual;
			data.buscar = "";
			data.where  = "matricula";
			data.like = valor;
			data.order2 = orden2;		}	

		}else{
			data = data_actual;
			data.buscar  = valor;
			data.like = "";
			data.where = "";
			data.order2 = orden2;
		}	

	}else{
		if(info.currentTarget.parentElement.parentElement.className == "dropdown-menu filtros"){
			alert("Necesitás ingresar un valor a buscar!");
			error = true;
		}
		tipo = info.currentTarget.innerText;
		limite = $("#mostrar_entre input").val();

		if(!limite){
			limite = "0,30";
		}
		if(tipo == "Ascendente"){
			console.log("hice click en ascendente");
			data = data_actual;
			data.order2 = "ASC";
		}		
		if(tipo == "Borrar Filtro"){
			data = data_actual;
			data.where = "" ;
			data.like = "";
			data.es = "";		
			data.buscar = "";		
			data.limit = limite;		
		}		
		if(tipo == "Descendente"){
			data = data_actual;
			data.order2 = "DESC";		
		}	
		if(tipo == "Mostrar entre"){
			data = data_actual
			data.limit = limite;
		}
		if(tipo == "Mostrar todos (lento)"){
			data = data_actual
			data.limit = "0";
			data.where = "" ;
			data.like = "";
			data.es = "";
		}
		if(tipo == "Año de Afiliacion"){
			data = data_actual
			data.order = "fecha_afiliacion";
		}
		if(tipo == "DNI"){
			data = data_actual
			data.order = "matricula";
		}
		if(tipo == "Apellido"){
			data = data_actual
			data.order = "apellido";
		}
		if(tipo == "Clase"){
			data = data_actual
			data.order = "clase";
		}
		if(tipo == "Nombres"){
			data = data_actual
			data.order = "nombres";
		}


	}
	if(!error){


	$("table tbody").html("<h1>Cargando la información</h1>");
	$.ajax({
		type: "POST",
		datatype: "json",
		url: "api.php",
		data: data
	}).done(function(msg){
		msg = JSON.parse(msg);
		console.log(msg);
		$("table tbody").html("");
		$.each(msg, function (i, val) {
			console.log(val);
			$("table tbody").append('<tr><td class="id"> '+val.id+' </td><td class="distrito"> '+val.distrito+' </td><td class="matricula"> '+val.matricula+' </td><td class="clase"> '+val.clase+' </td><td class="apellido"> '+val.apellido+' </td><td class="nombres"> '+val.nombres+' </td><td class="profesion"> '+val.profesion+' </td><td class="domicilio"> '+val.domicilio+' </td><td class="nro"> '+val.nro+' </td><td class="pisodepto"> '+val.pisodepto+' </td><td class="tipo_documento"> '+val.tipo_documento+' </td><td class="analfabeto"> '+val.analfabeto+' </td><td class="seccion"> '+val.seccion+' </td><td class="circuito"> '+val.circuito+' </td><td class="sexo"> '+val.sexo+' </td><td class="fecha_afiliacion"> '+val.fecha_afiliacion+' </td><td class="partido_politico"> '+val.partido_politico+' </td><td class="estado_afiliacion"> '+val.estado_afiliacion+' </td><td class="nro_registro"> '+val.nro_registro+' </td></tr>');

		});
		$("#prependedDropdownButton").val("");
		


	})
		data_actual = data;
		if(data_actual.where){
			$("#borrar_filtro").slideDown();
		}else{
			$("#borrar_filtro").slideUp();
		}
		if(data_actual.buscar){
			$("#borrar_filtro").slideDown();
		}else{
			$("#borrar_filtro").slideUp();
		}
			}
}
function inicio (info) {
	$('#radios').button()
	console.log("Aplicación iniciada");
}
