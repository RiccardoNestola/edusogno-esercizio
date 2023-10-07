<?php
include  './config.php';

if (isset($_POST["submit"])) {
    $attendees = $_POST['attendees'];
    $nomeEvento = $_POST['nome_evento'];
    $dataEvento = $_POST['data_evento'];


    $sql = "INSERT INTO `eventi`(`id`,`attendees`, `nome_evento`, `data_evento`) VALUES (NULL,'$attendees','$nomeEvento','$dataEvento')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        $_SESSION['success'] = "Nuovo evento creato con successo!";
        header("Location: /edusogno-esercizio/index.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<?php include './_partials/head.php'; ?>

<body>
    <?php include './_partials/header.php'; ?>
    <h1>Crea nuovo evento</h1>

    <div class="flex flex-center">

        <div class="form">
            <form action="" method="POST">
                <label>Mail</label>
                <input type="text" name="attendees" placeholder="inserisci la tua mail" required>
                <label>Nome Evento</label>
                <input type="text" name="nome_evento" placeholder="nome evento" required>
                <label for="data_evento">Data:</label>
                <input type="datetime-local" id="data_evento" name="data_evento" placeholder="Seleziona data" value="<?php echo date('Y-m-d\TH:i'); ?>" min="<?php echo date('Y-m-d\TH:i'); ?>" max="2050-06-14T00:00" required>

                <button type="submit" class="logout" name="submit">SALVA</button>


                <a href="index.php" class="logout red">Cancella</a>

            </form>

        </div>

    </div>
</body>


</html>