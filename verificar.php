<?php

 
      $loginOK = false; 




if($_SESSION["Pass"]){

if($_SESSION["Pass"] == md5(md5($config['pass_sitio']))){

$cookie = $_SESSION["pass"];
setcookie("Pass",$cookie,time()+7776000);


$loginOK = true;

}
else
{

}

}
?>