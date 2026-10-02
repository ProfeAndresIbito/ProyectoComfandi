<?php 
    session_start(); 

    if(!isset($_SESSION['email'])){ 
        header("Location: login.php"); 
        exit(); 
    }

    // Variables para el resultado
    $imc = null;
    $clasificacion = "";

    // Verificar si se envió el formulario
    if(isset($_POST['calcular'])){

        $peso = $_POST['peso'];
        $altura = $_POST['altura'];

        // Convertir altura de centímetros a metros
        $alturaMetros = $altura / 100;

        // Calcular IMC
        $imc = $peso / ($alturaMetros * $alturaMetros);

        // Redondear a 2 decimales
        $imc = round($imc, 2);

        // Clasificación
        if($imc < 18.5){
            $clasificacion = "Bajo peso";
        }
        elseif($imc < 25){
            $clasificacion = "Peso normal";
        }
        elseif($imc < 30){
            $clasificacion = "Sobrepeso";
        }
        else{
            $clasificacion = "Obesidad";
        }
    }
?> 
 
<!DOCTYPE html> 
<html lang="es"> 

<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Página Estudiante</title> 
    <link rel="stylesheet" href="css/estudiante.css"> 
</head> 

<body> 

    <div class="box"> 

        <button onclick="window.location.href='php/logout.php'">
            Cerrar Sesión
        </button>

        <h1>
            Bienvenido, 
            <span><?= $_SESSION['name']; ?></span>
        </h1>

        <form action="" method="post"> 

            <h2>Registro Para IMC</h2>

            <input 
                type="number" 
                name="peso" 
                placeholder="Peso en kg" 
                step="0.1"
                required
            >

            <input 
                type="number" 
                name="altura" 
                placeholder="Altura en cm" 
                step="0.1"
                required
            >

            <button type="submit" name="calcular">
                Calcular
            </button>

        </form>

        <?php if($imc !== null): ?>

            <div class="resultado">

                <h2>Resultado de tu IMC</h2>

                <p>
                    <strong>Peso:</strong> 
                    <?= $peso ?> kg
                </p>

                <p>
                    <strong>Altura:</strong> 
                    <?= $altura ?> cm
                </p>

                <p>
                    <strong>IMC:</strong> 
                    <?= $imc ?>
                </p>

                <p>
                    <strong>Clasificación:</strong> 
                    <?= $clasificacion ?>
                </p>

            </div>

        <?php endif; ?>

    </div>

</body> 
</html>