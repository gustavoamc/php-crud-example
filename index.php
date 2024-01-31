<?php
    require_once 'Connection.php';
    require_once 'Users.php';

    $conn = (new Connection())->getConn();
    $users = new Users($conn);

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $allUsers = $users->read();
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET"  && isset($_GET['id'])) {
        $userId = $_GET['id'];
        $singleUser = $users->readById($userId);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        echo $users->create($name, $email);
        header( "refresh:3;url=home.php" );
    }

    if ($_SERVER["REQUEST_METHOD"] == "PATCH") {
        $_PATCH = json_decode(file_get_contents("php://input"), true);
        $id = $_PATCH["id"];
        $name = $_PATCH["name"];
        $email = $_PATCH["email"];
        echo $users->update($id, $name, $email);
        header( "refresh:3;url=home.php" );
    }

    if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
        $_DELETE = json_decode(file_get_contents("php://input"), true);
        $id = $_DELETE["id"];
        echo $users->delete($id);
        header( "refresh:3;url=home.php" );
    }
?>