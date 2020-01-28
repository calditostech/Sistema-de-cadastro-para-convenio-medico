<?php

$hostname = "localhost";
$user = "root";
$password = "";
$database = "phpmyadmin";
$conexao = mysqli_connect($hostname,$user,$password,$database);

if(mysqli_connect_error()):
	echo "Falha na conexão:".mysqli_connect_error();
endif;


?>