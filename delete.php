<?php
  include 'connection.php';
  include 'index.php';

  // if ($singleUser = null){
  //   header("home.php");
  // }
  $userDelete = (array)$singleUser;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>Exemplo de Confirmação de Exclusão</title>
    <script>
          function delete_user() {
            var confirmed = confirm("Confirma a exclusão do usuário?");

            if (confirmed == true) {
              var formData = {
                  id: <?php echo $userDelete['id']; ?>,
              };

              // Make a DELETE request using fetch API
              fetch('http://localhost/phptest/index.php', {
                  method: 'DELETE',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(formData)
              })
              .catch(error => {
                  console.log(error.toString());
              });
          }
        }
    </script>
  </head>
  <body>
    <h1>Confirmar exclusão</h1>
    <form>
      <button
        class="inline-flex float-right items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10"
        onclick="delete_user();"
        >Excluir
        </button>
    </form>
  </body>
</html>