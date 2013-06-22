<?php
session_start();


require("configuracion.php");
if(trim($_POST['pass']) != "")
{
	if($_POST['pass'] == $config['pass_sitio']){
	$passN = md5(md5($_POST['pass']));
	$_SESSION['Pass'] = $passN;
	?>
				<h2>Ingresaste satisfactoriamente</h2>
				<SCRIPT LANGUAGE="javascript">
				location.href = "index.php";
				</SCRIPT>
	<?php
	}else{
		$contraseniaMal = true;
		?>
		<h2>Contrase&ntilde;a incorrecta!!</h2>
				<SCRIPT LANGUAGE="javascript">
				location.href = "index.php?malpwd=1";
				</SCRIPT>
		<?php
	}
}?>
