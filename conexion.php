<?php

$mysqli = new mysqli("localhost", $config['usuario_db'], $config['pass_db'], $config['nombre_db']);
if (mysqli_connect_errno()) {
    printf("fallo al conectar con : %s\n", mysqli_connect_error());
    exit();
}

?>