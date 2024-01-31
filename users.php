<?php
    require_once 'Connection.php';

    class Users {
        protected $conn;

        public function __construct() {
            $conn = new Connection();
            $this->conn = $conn->getConn();
        }

        public function read() {
            try {
                $query = "SELECT * FROM users";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $users;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        public function readById($id) {
            try {
                $query = "SELECT * FROM users WHERE  id=?";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([$id]);
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                return $user;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        public function create($name, $email) {
            try {
                $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
                $stmt= $this->conn->prepare($sql);
                $stmt->execute([$name, $email]);
                return "Usuário criado com sucesso!";
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        public function update($id, $name, $email) {
            try {
                $query = "SELECT * FROM users WHERE id = ?";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([$id]);
                if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                    return "Usuário não encontrado";
                }

                $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$name, $email, $id]);
                return "Usuário alterado com sucesso!";
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        public function delete($id) {
            try {
                $query = "SELECT * FROM users WHERE id = ?";
                $stmt = $this->conn->prepare($query);
                $stmt->execute([$id]);
                if (!$stmt->fetch(PDO::FETCH_ASSOC)) {
                    return "Usuário não encontrado";
                }

                $sql = "DELETE FROM users WHERE id = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                return "Usuário apagado com sucesso!";
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }
?>
