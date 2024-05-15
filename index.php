<?php
include_once __DIR__ . "/Models/Prodotto.php";
// echo $book->printCard($book->formatItem()); 
$accessori = Prodotto::fetchAll('Accessori_db', 'Accessorio');
$cibi = Prodotto::fetchAll('Cibo_db', 'Cibo');
$giochi = Prodotto::fetchAll('Giochi_db', 'Gioco');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . "/Views/head/head.php"; ?>
    <link rel="stylesheet" href="style/hype_utility.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/media_query.css">
    <link rel="stylesheet" href="style/animation.css">

    <title>Negozio di Animali</title>
</head>

<body class="bg-dark text-white">
    <?php include __DIR__ . "/Views/body/header.php"; ?>
    <main class="container">
        <div class="row">
            <h2>Accessori</h2>
            <?php foreach ($accessori as $accessorio) {
                echo $accessorio->printCard($accessorio->formatItem());
            }
            ?>
            <h2>Giochi</h2>
            <?php foreach ($giochi as $gioco) {
                echo $gioco->printCard($gioco->formatItem());
            }
            ?>
            <h2>Cibo</h2>
            <?php foreach ($cibi as $cibo) {
                echo $cibo->printCard($cibo->formatItem());
            }
            ?>
        </div>

    </main>
    <?php include __DIR__ . "/Views/body/footer.php" ?>
</body>

</html>