<?php
session_start();


require("configuracion.php");
require("conexion.php");

require("verificar.php");

function leer_contenido_completo($url){
   $fichero_url = fopen ($url, "r");
   $texto = "";
   while ($trozo = fgets($fichero_url, 1024)){
      $texto .= $trozo;
   }
   return json_decode($texto);
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Padrones EC 2013</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<link rel="stylesheet" href="./css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="./css/padrones.css" />
	<meta property="og:title" content="Padron Interno de Encuentro Ciudadano ">	
	<meta property="og:description" content="Padrón de Afiliados al partido, plataforma interna, acceso restringido. ">	
	<meta property="og:image" content="http://encuentrociudadano.org/default.jpg" /> 

</head>
<body>
	<?php if($loginOK){

	?>
		<header>
			<h1>Encuentro Ciudadano <small>- Sistema interno de padrones</small></h1>
			<section class="botones">
				<ul>
					<li class="form-search">
						  <div class="input-prepend" id="buscar_grupo">
						  	  <div class="btn-group">
							    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
							      Filtrar por
							      <span class="caret"></span>
							    </button>
							    <ul class="dropdown-menu filtros">
							      <li><a href="javascript:void(0)" class="">Apellido</a></li>
							      <li><a href="javascript:void(0)" class="">Nombre</a></li>
							      <li><a href="javascript:void(0)" class="">Calle</a></li>
							      <li><a href="javascript:void(0)" class="">Clase</a></li>
							      <li><a href="javascript:void(0)" class="">DNI</a></li>
							    </ul>
							  </div>
						    <input type="text"  placeholder="Ingresa el valor a buscar" class="span2" id="prependedDropdownButton">
						  </div>
					</li>
						<li class="form-search">
						  <div class="input-prepend" id="mostrar_entre">
						    <a href="javascript:void(0);" class="btn btn-info">Mostrar entre </a>
						    <input type="text" placeholder="0,30" class="span2">
						  </div>

					</li>
					<li> <a href="javascript:void(0);" id="mostrar_todos" class="btn btn-info" >Mostrar todos (lento)</a></li>
					<li> <a href="javascript:void(0);" id="borrar_filtro" class="btn btn-danger" >Borrar Filtro</a></li>
					<li><div class="btn-group">
	                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Ordenar por <span class="caret"></span></button>
	                <ul class="dropdown-menu" id="ordenes">
	                  <li><a href="javascript:void(0)" id="ordenar_anio">Año de Afiliacion</a></li>
	                  <li><a href="javascript:void(0)" id="ordenar_dni">DNI</a></li>
	                  <li><a href="javascript:void(0)" id="ordenar_clase">Clase</a></li>
	                  <li><a href="javascript:void(0)" id="ordenar_apellido">Apellido</a></li>
	                  <li><a href="javascript:void(0)" id="ordenar_nombre">Nombres</a></li>
	                </ul>
	              </div></li>
	              <li>
	              	<div class="btn-group" id="radios" data-toggle="buttons-radio">
					  <button type="button" class="btn btn-info active">Ascendente</button>
					  <button type="button" class="btn btn-info">Descendente</button>
					</div>
	              </li>
					
				</ul>
			</section>
		</header>
	<section class="container">



		<table class="table table-striped">
			<thead>
				<tr>
					<th class="id">ID</th>

					<th class="distrito">Distrito</th>

					<th class="matricula">Matricula</th>

					<th class="clase">Clase</th>

					<th class="apellido">Apellido</th>

					<th class="nombres">Nombres</th>

					<th class="profesion">Profesion</th>

					<th class="domicilio">Domicilio</th>

					<th class="nro">Nro</th>

					<th class="pisodpto">Piso<br>Dpto</th>

					<th class="tipo_documento">Tipo DNI</th>

					<th class="analfabeto">Analfabeto</th>

					<th class="seccion"><abbr title="Sección">Secc.</abbr></th>

					<th class="circuito"><abbr title="Circuito">Circ.</abbr></th>

					<th class="sexo">Sexo</th>

					<th class="fecha_afiliacion">F. Afiliacion</th>

					<th class="partido_politico">Partido</th>

					<th class="estado_afiliacion">Estado Afiliacion</th>

					<th class="nro_registro">Nro Registro</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$contenido_api = leer_contenido_completo("http://padrones.encuentrociudadano.org/api.php?limit=0,30&order=id&order2=asc");
				for ($i=0;$i<count($contenido_api); $i++){
					$item_actual = $contenido_api[$i];
					echo "<tr>";
					echo "<td class='id'> ".$item_actual->id." </td>";
					echo "<td class='distrito'> ".$item_actual->distrito." </td>";
					echo "<td class='matricula'> ".$item_actual->matricula." </td>";
					echo "<td class='clase'> ".$item_actual->clase." </td>";
					echo "<td class='apellido'> ".$item_actual->apellido." </td>";
					echo "<td class='nombres'> ".$item_actual->nombres." </td>";
					echo "<td class='profesion'> ".$item_actual->profesion." </td>";
					echo "<td class='domicilio'> ".$item_actual->domicilio." </td>";
					echo "<td class='profesion'> ".$item_actual->profesion." </td>";
					echo "<td class='pisodepto'> ".$item_actual->pisodepto." </td>";
					echo "<td class='tipo_documento'> ".$item_actual->tipo_documento." </td>";
					echo "<td class='analfabeto'> ".$item_actual->analfabeto." </td>";
					echo "<td class='seccion'> ".$item_actual->seccion." </td>";
					echo "<td class='circuito'> ".$item_actual->circuito." </td>";
					echo "<td class='sexo'> ".$item_actual->sexo." </td>";
					echo "<td class='fecha_afiliacion'> ".$item_actual->fecha_afiliacion." </td>";
					echo "<td class='partido_politico'> ".$item_actual->partido_politico." </td>";
					echo "<td class='estado_afiliacion'> ".$item_actual->estado_afiliacion." </td>";
					echo "<td class='nro_registro'> ".$item_actual->nro_registro." </td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>

	</section>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="./js/vendor/bootstrap-min.js"></script>
	<script src="./js/padrones.js"></script>
	<footer>
		<span>
			Plataforma desarrollada por <a href="http://www.adrianbarabino.com.ar">Adrian Barabino</a> - <a href="salir.php">Salir</a>
		</span>
	</footer>
	<?php
}else{

	if($_GET['malpwd']){
		echo "<h1>Contraseña Incorrecta!</h1>";
	}
	?>
<h2>Sistema privado, necesitás autenticarte antes</h2>
<form action="procesarlogin.php" method="post">
	<input type="password" placeholder="Contraseña" name="pass" />
</form>
	<?php
}
?>
</body>
</html>