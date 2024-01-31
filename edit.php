<?php
	include 'index.php';

	$userEdit = (array)$singleUser;
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Editar Usuário</title>
		<script>
				function update_user() {
						var formData = {
								id: <?php echo $userEdit['id']; ?>,
								name: document.getElementsByName("name")[0].value,
								email: document.getElementsByName("email")[0].value
						};

						// Make a PATCH request using fetch API
						fetch('http://localhost/phptest/index.php', {
								method: 'PATCH',
								headers: {
										'Content-Type': 'application/json'
								},
								body: JSON.stringify(formData)
						})
						.catch(error => {
								console.log(error.toString());
						});
				}
		</script>
	</head>
	<body>
			<h1>Editar Usuário</h1>

			<form id="alter_form">
					<input type="hidden" name="id" value="<?php echo $userEdit['id']; ?>">
					<label for="name">Nome:</label>
					<input type="text" name="name" value="<?php echo $userEdit['name']; ?>" required>
					<label for="email">Email:</label>
					<input type="email" name="email" value="<?php echo $userEdit['email']; ?>" required>
					<!-- Use onclick instead of on_click, and call the update_user function -->
					<button onclick="update_user();" type="button" name="submit">Salvar Alterações</button>
			</form>
	</body>
</html>
