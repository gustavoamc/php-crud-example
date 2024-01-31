<?php
    require_once 'users.php';
    require_once 'index.php';
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
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit" name="submit">Adicionar Usuário</button>
    </form>

    <h2>Lista de Usuários:</h2>
    <ul>
        <?php
        foreach ($allUsers as $user) {
            echo "<li>{$user['name']} - {$user['email']} (<a href='edit.php?id={$user['id']}'>Editar</a> |
              <a href='delete.php?id={$user['id']}'>Excluir</a>) </li>";
        }
        ?>
    </ul>
</body>
</html>