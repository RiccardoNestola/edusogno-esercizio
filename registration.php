<!DOCTYPE html>
<html lang="en">
<?php include './_partials/head.php'; ?>

<body>
    <?php 
    include './_partials/header.php';
    include './config.php';
    ?>
    <h1>Hai già un account?</h1>


    <?php include './_partials/notification.php' ?>
    <div class="flex flex-center">
        <div class="form">
            <form method="POST" action="./register.php">
                <label for="name">Inserisci il Nome:</label>
                <input type="text" id="name" name="name" placeholder="Mario" required>
                <label for="surname">Inserisci il Cognome:</label>
                <input type="text" id="surname" name="surname" placeholder="Rossi" required>
                <label for="email">Inserisci la tua mail:</label>
                <input type="text" id="email" name="email" placeholder="name@example.com" required>

                <div class="icon-toggle">
                    <label for="password">Inserisci la password:</label>
                    <input type="password" id="password" name="password" placeholder="Scrivila qui" required>
                    <button type="button" onclick="showPassword()">
                        <ion-icon name="eye-off"></ion-icon>
                    </button>
                </div>

                <input type="submit" value="registrati">

            </form>
            <div class="submit">
                <a href="login.php">Hai già un Account? <strong>Accedi</strong></a>
            </div>
        </div>
    </div>

</body>

</html>