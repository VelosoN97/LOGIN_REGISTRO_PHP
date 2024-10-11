<?php 
    session_start();
    require_once 'utiles.php';
    if(!Utiles::isLoggedIn()){
        Utiles::redirect('/login_registro/index.php');
    }
    $usuario = null;
    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <link rel='stylesheet' 
    href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css'>
</head>
<body class="bg-dark bg-gradient">
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="fw-bold text-secondary">Perfil Usuario</h1>
                    </div>
                    <div class="card-body p-5">
                       <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <td><?= $usuario['nombre'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $usuario['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Creado en</th>
                                <td><?= $usuario['created_at'] ?></td>
                            </tr>  
                            <tr>
                                <th>Actualizado en</th>
                                <td><?= $usuario['updated_at'] ?></td>
                            </tr>                           
                       </table>
                    </div>
                    <div class="card-footer px-5 text-end">
                        <a href="action.php?logout=1" name="logout" class="btn btn-danger">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    window.onload = function() {
        setTimeout(function() {
            const mensaje = document.getElementById('registro_error');
            if (mensaje) {
                mensaje.style.display = 'none';
            }

            const mensajeCompleto = document.getElementById('registro_completo');
            if (mensajeCompleto) {
                mensajeCompleto.style.display = 'none';
            }

            const mensajeUltraCompleto =document.getElementById('login_error');
            if (mensajeUltraCompleto){
                mensajeUltraCompleto.style.display = 'none';
            }
        }, 2000); // 5000 milisegundos = 5 segundos
    };
</script>
</body>
</html>