<?php
//Se conecta com o bando de dados (o nome do host,usuário do banco de dados, a senha,o nome do banco de dados,a porta que esta rodando)
$con = mysqli_connect("localhost","root","***senha***","products","3306");

if(!$con){
    die('connection fail' . mysqli_connect_error());
}

?>