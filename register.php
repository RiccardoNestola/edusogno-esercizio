<?php
session_start();
include './config.php';

if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])){
    register($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['password'], $connection);
}else{
    header("Location: ../../registration.php");
    session_destroy();
}

function register($name, $surname, $email, $password, $connection)
{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $connection->prepare("INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $surname, $email, $hashed_password);

    $stmt->execute();
    $stmt->close();

    $_SESSION['success'] = 'Registrazione avvenuta con successo. Ora effettua il Login';
    
    header("Location: /edusogno-esercizio/login.php");
}

