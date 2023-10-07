<!DOCTYPE html>
<html lang="en">
<?php include './_partials/head.php'; ?>

<body>
    <?php include './_partials/header.php'; ?>
    <h1>Hai già un account?</h1>


    <?php include './_partials/notification.php' ?>
    <div class="flex flex-center">
        <div class="form">
            <form method="POST" action="./login-action.php">
                <label for="email">Inserisci la tua mail:</label>
                <input type="text" id="email" name="email" placeholder="name@example.com" required>

                <div class="icon-toggle">
                    <label for="password">Inserisci la password:</label>
                    <a class="restore" href="reset-psw.php">Password dimenticata?</a>
                    <input type="password" id="password" name="password" placeholder="Scrivila qui" required>
                    <button type="button" onclick="showPassword()">
                        <ion-icon name="eye-off"></ion-icon>
                    </button>
                </div>



                <input type="submit" value="accedi">

            </form>
            <div class="submit">
                <a href="registration.php">Non hai ancora un profilo? <strong>Registrati</strong></a>
            </div>
        </div>
    </div>

</body>

</html>