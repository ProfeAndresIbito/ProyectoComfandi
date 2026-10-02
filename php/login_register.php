<?php
    session_start();
    require_once 'conexion.php';

    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];

        $checkEmail = $conn->query("SELECT email FROM usuarios WHERE email='$email'");

        if ($checkEmail->num_rows > 0) {
            $_SESSION['register_error'] = 'Email ya esta registrado';     
        }else{
            $conn->query("INSERT INTO usuarios (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
        }
        header("Location: ../login.php");
    }

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $conn->query("SELECT * FROM usuarios WHERE email='$email'");

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            if(password_verify($password, $user['password'])){
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];

                if($user['role'] === 'docente'){
                    header("Location: ../docente.php");
                }else if($user['role'] === 'estudiante'){
                    header("Location: ../estudiante.php");
                }else if($user['role'] === 'personal_seguimiento'){
                    header("Location: ../personal_seguimiento.php");
                }
                exit();
            }
        }
        $_SESSION['login_error'] = 'Credenciales invalidas';
        header("Location: ../login.php");
        exit();
    }
?>