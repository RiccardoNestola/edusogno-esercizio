
<?php
include './config.php';

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    if (isset($_POST["submit"])) {
        $new_nomeEvento = $_POST['new_nome_evento'];
        $new_dataEvento = $_POST['new_data_evento'];

        $sql = "UPDATE `eventi` SET `nome_evento`='$new_nomeEvento', `data_evento`='$new_dataEvento' WHERE id = $event_id";

        $result = mysqli_query($connection, $sql);

        if ($result) {
            $_SESSION['success'] = "Evento modificato con successo!";
            header("Location: /edusogno-esercizio/index.php");
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }

    $sql = "SELECT * FROM `eventi` WHERE id = $event_id";
    $result = mysqli_query($connection, $sql);
    $event = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include './_partials/head.php'; ?>

<body>
    <?php include './_partials/header.php'; ?>
    <h1>Modifica evento</h1>

    <div class="flex flex-center">
        <div class="form">
            <form action="" method="POST">
                <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                <label>Nuovo Nome Evento:</label>
                <input type="text" name="new_nome_evento" value="<?php echo $event['nome_evento']; ?>" required>
                <label>Nuova Data:</label>
                <input type="datetime-local" name="new_data_evento" placeholder="Seleziona data" value="<?php echo $event['data_evento']; ?>" required>

                <button type="submit" name="submit">Modifica Evento</button>

                <a href="index.php" class="logout red">Annulla</a>
            </form>
        </div>
    </div>
</body>

</html>