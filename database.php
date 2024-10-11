<?php

//echo "Cargando database.php...";

require_once 'config.php';

class Database{
    private const DSN = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    private $conn;

    public function __construct(){
        echo "Intentando conectar a la base de datos...";
        try{
            $this->conn = new PDO(self::DSN, DB_USER, DB_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo 'Conexión exitosa a la base de datos'; // Añade este echo para probar la conexión
        } catch(PDOException $e){
            echo 'Conexión fallida: ' . $e->getMessage(); // Esto mostrará cualquier error de conexión
        }
    }
    

    public function registro($nombre, $email, $password){
        $sql = "INSERT INTO login_usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function getUsuarioByEmail($email){
        $sql = "SELECT * FROM login_usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();
        return $usuario;
    }

    public function login($email, $password){
        $sql = "SELECT * FROM login_usuarios WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();
        if($usuario){
            if(password_verify($password, $usuario['password'])){
                return $usuario;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function guardarToken($id_usuario, $token) {
        $sql = "UPDATE login_usuarios SET token = :token WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'token' => $token,
            'id' => $id_usuario
        ]);
    }

    public function getUsuarioByToken($token) {
        $query = "SELECT * FROM login_usuarios WHERE token = :token";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['token' => $token]);
        return $stmt->fetch();
    }
    
    public function actualizarPassword($id, $hashed_password) {
        $query = "UPDATE login_usuarios SET password = :password, token = NULL, updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'password' => $hashed_password,
            'id' => $id
        ]);
    }
    
}