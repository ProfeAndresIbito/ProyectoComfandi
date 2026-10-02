<?php
    session_start();
    
    $errors = [
        'login' => $_SESSION['login_error'] ?? '',
        'register' => $_SESSION['register_error'] ?? ''
    ];

    session_unset();
    
    function showError($error){
        return !empty($error) ? "<p class='error_message'>".$error."</p>" : '';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Login & Register Form With User & Admin Page | Codehal</title>
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <form action="php/login_register.php" method="post">
                <h2>Registro</h2>
                <?= showError($errors['login']);?>
                <input type="text" name="name" placeholder="Nombre de Usuario" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" id="" required>
                    <option value="">--Seleccione un Rol--</option>
                    <option value="docente">Docente</option>
                    <option value="estudiante">Estudiante</option>
                    <option value="personal_seguimiento">Personal de Seguimiento</option>
                </select>
                <button type="submit" name="register">Registrarse</button>
                <p>¿Ya tenes una cuenta? <a href="login.php">Inicia Sesión</a></p>
            </form>
        </div>
    </div>
</body>
</html>