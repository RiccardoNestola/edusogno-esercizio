<!DOCTYPE html>
<html lang="en">
<?php include './_partials/head.php'; ?>

<body>
    <?php
    include './_partials/header.php';
    include  './config.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: /edusogno-esercizio/login.php");
        exit;
    }

    function getList($connection)
    {
        $sql = "SELECT * FROM eventi";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            $events = $result->fetch_all(MYSQLI_ASSOC);
            return $events;
        } else {
            return [];
        }
    }




    $events = getList($connection);
    ?>
    <main>
        <h1>Ciao <span class="username">
                <?php
                echo $_SESSION['user_name'];
                echo ' ' . $_SESSION['user_surname'];
                ?>
            </span> ecco gli eventi</h1>

        <div class="flex flex-end">
            <a href="/edusogno-esercizio/add-event.php" class="add flex-bet">Aggiungi Evento</a>
        </div>


        <div class="flex-center">
            <?php if ($events) foreach ($events as $event) { ?>
                <div class="card">
                    <h2><?= $event['nome_evento']; ?></h2>
                    <p><?= $event['data_evento']; ?></p>

                    <a class="logout yellow" href="edit-event.php?id=<?php echo $event['id']; ?>">Modifica</a>

                    <a>
                        <?php
                        echo "<a onClick=\" javascript:return confirm(' Eliminare evento? '); \" class='logout red' href='delete-event.php?id={$event['id']}'>Elimina</a>"
                        ?>
                    </a>


                </div>
            <?php }
            else { ?>
                <p>Nessun evento trovato.</p>
            <?php } ?>
        </div>

    </main>












</body>

</html>