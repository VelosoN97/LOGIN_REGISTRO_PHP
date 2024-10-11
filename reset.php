<?php
// reset.php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    echo "Token no válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
    <link rel='stylesheet' 
    href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css'>
</head>
<body class="bg-dark bg-gradient">
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="fw-bold text-secondary">Restablecer contraseña</h1>
                    </div>
                    <div class="card-body p-5">
                        <form action="action.php" method="POST">
                            <input type="hidden" name="token" value="<?= $token ?>">
                            
                            <div class="mb-3">
                                <label for="password">Nueva Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="confirmar_password">Repetir Contraseña</label>
                                <input type="password" name="confirmar_password" id="confirmar_password"
                                    class="form-control" required>
                            </div>
                        
                            <div class="mb-3 d-grid">
                                <input type="submit" name="reset" value="Cambiar contraseña" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>