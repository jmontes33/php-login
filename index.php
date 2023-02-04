<?php

session_start();

require 'database.php';



if (isset($_SESSION['users_id'])) {
    $records = $connect->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['users_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <title>Registro/Acceso</title>
</head>

<body>

    <?php require 'partials/header.php' ?>

    <?php if (!empty($user)) : ?>
        <br>Bienvenido. <?= $user['email'] ?>
        <br>Has iniciado sesión satisfactoriamente.
        <br><a href="logout.php">Salir</a>
    <?php else : ?>

        <h1>Inicia sesión o regístrate</h1>
        <a href="login.php">Acceder</a>
        <a href="signup.php">Regístrate</a>
    <?php endif ?>
</body>

</html>