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
    <title>Registro</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css'>
</head>

<body class="bg-dark bg-gradient">
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="fw-bold text-secondary">Registro</h1>
                    </div>
                    <div class="card-body p-5">
                        <?php
                            Utiles::displayFlash('registro_error','danger');
                        ?>
                        <form action="action.php" method="POST">
                            <input type="hidden" name="registro" value="1">
                            <div class="mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">E-Mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="repetir_password">Repetir Contraseña</label>
                                <input type="password" name="repetir_password" id="repetir_password"
                                    class="form-control" required>
                            </div>
                            <div class="mb-3 d-grid">
                                <input type="submit" name="registro" value="Registrar" class="btn btn-primary">
                            </div>
                            <p class="text-center">Ya tienes una cuenta?
                                <a href="/login_registro/index.php">Inicia sesión</a>
                            </p>
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
        }, 2000); // 5000 milisegundos = 5 segundos
    };
</script>
</body>

</html>