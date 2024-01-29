<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM usuarios WHERE id = $id";
    $conexao->query($sql);

    header("Location: index.php"); // Redireciona de volta para a lista após a exclusão
    exit();
} else {
    die("Requisição inválida.");
}
?>