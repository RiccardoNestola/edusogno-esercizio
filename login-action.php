<?php
session_start();
include __DIR__ . '/config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    login($_POST['email'], $_POST['password'], $connection);
} else {
    header("Location: /edusogno-esercizio/login.php");
    session_destroy();
}

function login($inputEmail, $inputPassword, $connection)
{
    $stmt = $connection->prepare("SELECT `id`, `nome`, `cognome`, `password` FROM `utenti` WHERE `email` = ?");
    $stmt->bind_param("s", $inputEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        if (password_verify($inputPassword, $userData['password'])) {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_name'] = $userData['nome'];
            $_SESSION['user_surname'] = $userData['cognome'];
            header("Location: /edusogno-esercizio/index.php");
        } else {
            $_SESSION['error'] = 'La password inserita è errata.';
            header("Location: /edusogno-esercizio/login.php");
        }
    } else {
        $_SESSION['error'] = 'Nessun utente trovato';
        header("Location: /edusogno-esercizio/login.php");
    }

    $stmt->close();
}
