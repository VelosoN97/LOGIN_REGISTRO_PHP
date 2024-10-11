<?php 
    session_start();
    require_once 'utiles.php';
    if(Utiles::isLoggedIn()){
        Utiles::redirect('/login_registro/perfil.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' 
    href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css'>
</head>
<body class="bg-dark bg-gradient">
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="fw-bold text-secondary">Login</h1>
                    </div>
                    <div class="card-body p-5">
                        <?php
                            echo Utiles::displayFlash('registro_completo','success');
                            echo Utiles::displayFlash('login_error','danger');
                        ?>
                        <form action="action.php" method="POST">
                            <input type="hidden" name="login" value="1">
                            
                            <div class="mb-3">
                                <label for="email">E-Mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <a href="/login_registro/olvidar.php">Olvidaste la contraseña?</a>
                            </div>
                            
                            <div class="mb-3 d-grid">
                                <input name="login" type="submit" value="Login" class="btn btn-primary">
                            </div>
                            <p class="text-center">¿No tienes una cuenta? 
                                <a href="/login_registro/registro.php">Regístrate</a></p>
                        </form>
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