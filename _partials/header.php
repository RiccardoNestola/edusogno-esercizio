<?php session_start(); ?>
<header class="flex flex-start">
    <div class="logo flex-grow">
        <a href="/edusogno-esercizio/index.php"><img src="/edusogno-esercizio/assets/img/logo.svg" alt="edusogno-esercizio Logo"></a>
    </div>
    <?php if (isset($_SESSION['user_id'])) : ?>

        <a href="/edusogno-esercizio/logout.php" class="logout flex-bet">Logout</a>

    <?php endif; ?>
</header>