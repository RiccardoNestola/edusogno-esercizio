<?php
include  './config.php';
$id = $_GET["id"];
$sql = "DELETE FROM `eventi` WHERE id = $id";
$result = mysqli_query($connection, $sql);

if ($result) {
    $_SESSION['success'] = "Evento eliminato con successo!";
    header("Location: /edusogno-esercizio/index.php");
} else {
    echo "Failed: " . mysqli_error($connection);
}
