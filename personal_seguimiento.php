

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Personal Seguimiento</title>
    <link rel="stylesheet" href="css/estudiante.css">
</head>
<body>
    <div class="box">
        <h1>Bienvenido, <span><?=$_SESSION['name'];?></span></h1>
        <p>Este es un <span>Personal Seguimiento</span> page</p>
        <button onclick="window.location.href='php/logout.php'">Cerrar Sesión</button>
    </div>
</body>
</html>