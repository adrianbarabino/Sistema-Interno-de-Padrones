<?php

require("configuracion.php");
require("conexion.php");


$consulta = "SELECT * FROM  `padron` ";
if($_REQUEST['where'] && $_REQUEST['es'] || $_REQUEST['where'] && $_REQUEST['like']){
	$consulta .= "WHERE `".$_REQUEST['where']."` ";
	if($_REQUEST['es']){
		$consulta .= " = '".$_REQUEST['es']."' ";
	}
	if($_REQUEST['like']){
		$consulta .= " LIKE '%".$_REQUEST['like']."%' ";
	}
}
if($_REQUEST['order']){
	$consulta .= "ORDER BY `".$_REQUEST['order']."` ";

}else{
	$consulta .= "ORDER BY `id` ";

}
if($_REQUEST['order2']){
	$consulta .= "".$_REQUEST['order2']." ";
}
if($_REQUEST['limit']){
	$consulta .= "LIMIT ".$_REQUEST['limit']." ";
}
$resultado = $mysqli->query($consulta);
echo "[ \n";
while ($reg=$resultado->fetch_array())
{
     $respuesta .= '{'. "\n";
     $respuesta .= '   "id": "'.$reg["id"].'" ,'. "\n";
     $respuesta .= '   "distrito": "'.$reg["distrito"].'" ,'. "\n";
     $respuesta .= '   "matricula": "'.$reg["matricula"].'" ,'. "\n";
     $respuesta .= '   "clase": "'.$reg["clase"].'" ,'. "\n";
     $respuesta .= '   "apellido": "'.$reg["apellido"].'" ,'. "\n";
     $respuesta .= '   "nombres": "'.$reg["nombres"].'" ,'. "\n";
     $respuesta .= '   "profesion": "'.$reg["profesion"].'" ,'. "\n";
     $respuesta .= '   "domicilio": "'.$reg["domicilio"].'" ,'. "\n";
     $respuesta .= '   "nro": "'.$reg["nro"].'" ,'. "\n";
     $respuesta .= '   "pisodpto": "'.$reg["pisodpto"].'" ,'. "\n";
     $respuesta .= '   "tipo_documento": "'.$reg["tipo_documento"].'" ,'. "\n";
     $respuesta .= '   "analfabeto": "'.$reg["analfabeto"].'" ,'. "\n";
     $respuesta .= '   "seccion": "'.$reg["seccion"].'" ,'. "\n";
     $respuesta .= '   "circuito": "'.$reg["circuito"].'" ,'. "\n";
     $respuesta .= '   "sexo": "'.$reg["sexo"].'" ,'. "\n";
     $respuesta .= '   "fecha_afiliacion": "'.$reg["fecha_afiliacion"].'" ,'. "\n";
     $respuesta .= '   "partido_politico": "'.$reg["partido_politico"].'" ,'. "\n";
     $respuesta .= '   "estado_afiliacion": "'.$reg["estado_afiliacion"].'" ,'. "\n";
     $respuesta .= '   "nro_registro": "'.$reg["nro_registro"].'"'. "\n";
     $respuesta .= '},'. "\n";
}
echo substr($respuesta, 0, -2);
echo "\n ] ";

?>
