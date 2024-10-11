<?php

/*require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';*/

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

echo "Cargando action.php...<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Formulario enviado.<br>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else {
    echo "No se envió el formulario.";
}
require_once 'utiles.php';
require_once 'database.php';

class AuthSystem {
    private $db;

    public function __construct(){
        session_start();
        $this->db = new Database();
    }

    public function registroUsuario($nombre, $email, $password, $confirmar_password){
        $nombre = Utiles::sanitize($nombre);
        $email = Utiles::sanitize($email);
        $password = Utiles::sanitize($password);
        $confirmar_password = Utiles::sanitize($confirmar_password);

        if($password !== $confirmar_password){
            Utiles::setFlash('registro_error','Las contraseñas no coinciden!');
            Utiles::redirect('login_registro/registro.php');
        } else {
            $usuario = $this->db->getUsuarioByEmail($email);

            if($usuario){
                Utiles::setFlash('registro_error','El correo electrónico ya existe');
                Utiles::redirect('login_registro/registro.php');
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $this->db->registro($nombre, $email, $hashed_password);
                Utiles::setFlash('registro_completo','Ya estás registrado y ahora puedes iniciar sesión');
                Utiles::redirect('/login_registro/index.php');
            }
        }
    }

    public function loginUsuario($email, $password){
        $email = Utiles::sanitize($email);
        $password = Utiles::sanitize($password);
        $usuario = $this->db->login($email, $password);
        if($usuario){
            unset($usuario['password']);
            $_SESSION['usuario'] = $usuario;
            Utiles::redirect('/login_registro/perfil.php');
        } else {
            Utiles::setFlash('login_error','Credenciales incorrectas');
            Utiles::redirect('/login_registro/index.php');
        }
    }

    public function cerrarSesion(){
        unset($_SESSION['usuario']);
        Utiles::redirect('/login_registro/index.php');
    }

    public function olvidarPassword($email){
        $email = Utiles::sanitize($email);
    $usuario = $this->db->getUsuarioByEmail($email);
    if($usuario){
        $token = bin2hex(random_bytes(50));
        $this->db->guardarToken($usuario['id'], $token);
        $resetLink = BASE_URL . '/login_registro/reset.php?token=' . $token; // Crear el enlace de restablecimiento

        // Configurar PHPMailer
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia esto por tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'niko.veloso.15@gmail.com'; // Tu dirección de correo
        $mail->Password = 'mokgaoeoxlszllqp'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // o PHPMailer::ENCRYPTION_SMTPS
        $mail->Port = 587; // Cambia el puerto si es necesario

        // Configurar el correo
        $mail->setFrom('niko.veloso.15@gmail.com', 'Nicolas'); // Remitente
        $mail->addAddress($email); // Destinatario
        $mail->Subject = 'Restablecer tu contraseña';
        $mail->Body = "Haz clic en el siguiente enlace para restablecer tu contraseña: $resetLink";

        // Enviar el correo
        if ($mail->send()) {
            Utiles::setFlash('registro_completo', 'Se ha enviado un enlace de restablecimiento a tu correo.');
        } else {
            Utiles::setFlash('registro_error', 'Hubo un error al enviar el correo: ' . $mail->ErrorInfo);
        }
        Utiles::redirect('/login_registro/index.php');
    } else {
        Utiles::setFlash('registro_error', 'No se encontró ninguna cuenta con ese correo electrónico.');
        Utiles::redirect('/login_registro/olvidar.php');
    }
    }

    public function resetPassword($token, $password, $confirmar_password){
        if ($password !== $confirmar_password) {
            Utiles::setFlash('registro_error', 'Las contraseñas no coinciden.');
            Utiles::redirect('/login_registro/reset.php?token=' . $token);
        } else {
            $usuario = $this->db->getUsuarioByToken($token);
            if ($usuario) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $this->db->actualizarPassword($usuario['id'], $hashed_password);
                Utiles::setFlash('registro_completo', 'Tu contraseña ha sido restablecida exitosamente.');
                Utiles::redirect('/login_registro/index.php');
            } else {
                Utiles::setFlash('registro_error', 'El token no es válido o ha expirado.');
                Utiles::redirect('/login_registro/index.php');
            }
        }
    }
}


$authSystem = new AuthSystem();
if(isset($_POST['registro'])){
    echo "Formulario enviado";
    echo "<pre>";
    print_r($_POST); // Esto mostrará todos los datos enviados desde el formulario
    echo "</pre>";
    $authSystem->registroUsuario($_POST['nombre'], $_POST['email'], $_POST['password'], $_POST['repetir_password']);
} elseif(isset($_POST['login'])){
    $authSystem->loginUsuario($_POST['email'], $_POST['password']);
} elseif(isset($_GET['logout'])){
    $authSystem->cerrarSesion();
} elseif(isset($_POST['olvidar'])){
    $authSystem->olvidarPassword($_POST['email']);
} elseif(isset($_POST['reset'])){
    $authSystem->resetPassword($_POST['token'], $_POST['password'], $_POST['confirmar_password']);
}