<?php
session_start();
include './config.php';

if (isset($_POST['email'])) {
    sendPassword($_POST['email'], $connection);
} else {
    header("Location: ./reset-psw.php");
}

function sendPassword($email, $connection) {
    $stmt = $connection->prepare("SELECT `id`, `nome`, `email` FROM `utenti` WHERE `email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $temp_password = bin2hex(openssl_random_pseudo_bytes(4));
        $hashed_password = password_hash($temp_password, PASSWORD_DEFAULT);

        $stmt = $connection->prepare("UPDATE `utenti` SET `password` = ? WHERE `id` = ?");
        $stmt->bind_param("si", $hashed_password, $user['id']);
        $stmt->execute();

        $to = $user['email'];
        $subject = "Recupero Password";
        $message = "Ciao " . $user['nome'] . ",\n\nLa tua password è: " . $temp_password . "\n\nSi prega di cambiare la password successivamente";

        if (mail($to, $subject, $message)) {
            $_SESSION['success'] = "La nuova password è stata inviata al tuo indirizzo email.";
            header("Location: /edusogno-esercizio/login.php");
        } else {
            $_SESSION['error'] = "Si è verificato un errore durante l'invio dell'email.";
            header("Location: /edusogno-esercizio/reset-psw.php");
        }

    } else {
        $_SESSION['error'] = "Nessun utente trovato";
        header("Location: /edusogno-esercizio/reset-psw.php");
    }

    $stmt->close();
}
