<?php

require("configuracion.php");
require("conexion.php");


if($_REQUEST['query']){

$consulta = "SELECT apellido, nombres, domicilio, matricula, clase FROM  `padron`  WHERE (`apellido` LIKE '%".$_REQUEST['query']."%' OR `nombres` LIKE '%".$_REQUEST['query']."%' OR `matricula` LIKE '%".$_REQUEST['query']."%' OR `clase` LIKE '%".$_REQUEST['query']."%' OR `domicilio` LIKE '%".$_REQUEST['query']."%' ) ";

}else{


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

if($_REQUEST['buscar']){
	$consulta .= "WHERE (`apellido` LIKE '%".$_REQUEST['buscar']."%' OR `nombres` LIKE '%".$_REQUEST['buscar']."%' OR `matricula` LIKE '%".$_REQUEST['buscar']."%' OR `clase` LIKE '%".$_REQUEST['buscar']."%' OR `domicilio` LIKE '%".$_REQUEST['buscar']."%' )";
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
}
$resultado = $mysqli->query($consulta);
echo "[ \n";
while ($reg=$resultado->fetch_array())
{
     $respuesta .= '{'. "\n";
    if($reg["id"]){ $respuesta .= '   "id": "'.$reg["id"].'" ,'. "\n"; };
    if($reg["distrito"]){ $respuesta .= '   "distrito": "'.$reg["distrito"].'" ,'. "\n"; };
    if($reg["matricula"]){ $respuesta .= '   "matricula": "'.$reg["matricula"].'" ,'. "\n"; };
    if($reg["clase"]){ $respuesta .= '   "clase": "'.$reg["clase"].'" ,'. "\n"; };
    if($reg["apellido"]){ $respuesta .= '   "apellido": "'.$reg["apellido"].'" ,'. "\n"; };
    if($reg["nombres"]){ $respuesta .= '   "nombres": "'.$reg["nombres"].'" ,'. "\n"; };
    if($reg["profesion"]){ $respuesta .= '   "profesion": "'.$reg["profesion"].'" ,'. "\n"; };
    if($reg["domicilio"]){ $respuesta .= '   "domicilio": "'.$reg["domicilio"].'" ,'. "\n"; };
    if($reg["nro"]){ $respuesta .= '   "nro": "'.$reg["nro"].'" ,'. "\n"; };
    if($reg["pisodpto"]){ $respuesta .= '   "pisodpto": "'.$reg["pisodpto"].'" ,'. "\n"; };
    if($reg["tipo_documento"]){ $respuesta .= '   "tipo_documento": "'.$reg["tipo_documento"].'" ,'. "\n"; };
    if($reg["analfabeto"]){ $respuesta .= '   "analfabeto": "'.$reg["analfabeto"].'" ,'. "\n"; };
    if($reg["seccion"]){ $respuesta .= '   "seccion": "'.$reg["seccion"].'" ,'. "\n"; };
    if($reg["circuito"]){ $respuesta .= '   "circuito": "'.$reg["circuito"].'" ,'. "\n"; };
    if($reg["sexo"]){ $respuesta .= '   "sexo": "'.$reg["sexo"].'" ,'. "\n"; };
    if($reg["fecha_afiliacion"]){ $respuesta .= '   "fecha_afiliacion": "'.$reg["fecha_afiliacion"].'" ,'. "\n"; };
    if($reg["partido_politico"]){ $respuesta .= '   "partido_politico": "'.$reg["partido_politico"].'" ,'. "\n"; };
    if($reg["estado_afiliacion"]){ $respuesta .= '   "estado_afiliacion": "'.$reg["estado_afiliacion"].'" ,'. "\n"; };
    if($reg["nro_registro"]){ $respuesta .= '   "nro_registro": "'.$reg["nro_registro"].'"'. "\n";
 };     

 if($_REQUEST['query']){
 	$respuesta =  substr($respuesta, 0, -2). '},'. "\n";
 }else{
 	$respuesta =  substr($respuesta, 0, -1). '},'. "\n";
 }
}
echo substr($respuesta, 0, -2);
echo "\n ] ";

?>
