<?php
include 'conexao.php';

// CREATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
    $conexao->query($sql);
}

// READ
$sql = "SELECT * FROM usuarios";
$resultado = $conexao->query($sql);

// UPDATE
// em editar.php

// DELETE
// em excluir.php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD em PHP</title>
</head>
<body>
    <h1>CRUD em PHP</h1>

    <form method="POST" action="index.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="submit">Adicionar Usuário</button>
    </form>

    <h2>Lista de Usuários:</h2>
    <ul>
        <?php
        while ($row = $resultado->fetch()) {
            echo "<li>{$row['nome']} - {$row['email']} (<a href='editar.php?id={$row['id']}'>Editar</a> |
              <a href='excluir.php?id={$row['id']}'>Excluir</a>) </li>";
        }
        ?>
    </ul>
</body>
</html>
