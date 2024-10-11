<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olvidaste la contraseña?</title>
    <link rel='stylesheet' 
    href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css'>
</head>
<body class="bg-dark bg-gradient">
    <div class="container">
        <div class="row min-vh-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h1 class="fw-bold text-secondary">Recuperar contraseña</h1>
                    </div>
                    <div class="card-body p-5">
                        <form action="action.php" method="POST">
                            <input type="hidden" name="olvidar" value="1">
                            
                            <div class="mb-3">
                                <label for="email">E-Mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        
                            <div class="mb-3 d-grid">
                                <input type="submit" name="olvidar" value="Enviar link" class="btn btn-primary">
                            </div>
                            <p class="text-center">¿Deseas iniciar sesión? 
                                <a href="/login_registro/index.php">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>