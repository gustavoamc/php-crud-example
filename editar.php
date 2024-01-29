<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id = $_GET["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";
    $conexao->query($sql);

    header("Location: index.php"); // Redireciona de volta para a lista após a edição
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conexao->query($sql);

    if ($resultado != null) {
        $usuario = $resultado->fetch();
    } else {
        die("Usuário não encontrado.");
    }
  } else {
    die("Requisição inválida.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    <form method="POST" action="editar.php?id=<?php echo $usuario['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        <button type="submit" name="submit">Salvar Alterações</button>
    </form>
</body>
</html>
