<div class="col-12 col-md-4 col-lg-3 mb-3">
    <div class="card overflow-hidden hype-shadow-white" style="background-color: <?= $colore ?>">
        <h3 class="card-title text-center"><?= $name ?></h3>
        <img src="<?= $img ?>" class="card-img-top rounded-circle mx-auto" alt="<?= $name ?>">
        <div class="card-body">
            <p class="card-text description small"><?= $descrizione ?></p>
            <h5 class="card-title"><?= $tipo ?></h5>
            <?= $valutazione ?>
            <p>Price: <?= $prezzo ?></p>
        </div>
    </div>
</div>