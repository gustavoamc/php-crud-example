<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "usutest";

$conexao = new PDO('mysql:host=127.0.0.1;dbname=usutest;port=3306','root','');

/*sql query usada para gerar o db e a tabela

CREATE DATABASE usutest;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30),
    email VARCHAR(30),
);

*/
?>

