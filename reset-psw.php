<!DOCTYPE html>
<html lang="en">
<?php include './_partials/head.php'; ?>

<body>
    <?php include './_partials/header.php'; ?>
    <h1>Richiedi una nuova password temporanea</h1>
    <?php include './_partials/notification.php' ?>
    <div class="flex flex-center">
        <div class="form">
            <form method="POST" action="./send-psw.php">
                <label for="email">Inserisci la tua mail</label>
                <input type="text" id="email" name="email" placeholder="inserisci la tua e-mail" required>
                <input type="submit" value="Conferma ed Invia">
            </form>
        </div>
    </div>
</body>

</html>