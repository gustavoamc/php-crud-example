<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "usutest";

//$conexao = new mysqli($host, $usuario, $senha, $banco); //works

$conexao = new PDO('mysql:host=127.0.0.1;dbname=usutest;port=3306','root','');

?>