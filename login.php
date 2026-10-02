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
    <title>Login & Register</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <form action="php/login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']);?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
                <p>¿No tenes cuenta? <a href="registro.php">Registrar</a></p>
            </form>
        </div>
    </div>
</body>
</html>