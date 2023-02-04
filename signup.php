<?php

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password']) && ($_POST['confirm_password']) == ($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUE (:email, :password)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'El usuario ha sido creado';
    } else {
        $message = 'Lo sentimos, ha habido un error creando su usuario';
    }
} else {
    $message = "Las contraseñas no coinciden.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <title>Registro</title>
</head>

<body>
    <?php require 'partials/header.php' ?>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>


    <h1>Registro</h1>

    <form action="signup.php" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="password" name="confirm_password" placeholder="Confirma tu Contraseña">
        <input type="submit" value="Acceder">
    </form>
</body>

</html>