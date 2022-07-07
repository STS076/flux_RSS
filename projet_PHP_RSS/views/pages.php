<?php

require_once '../controllers/pages-controller.php';

if (!isset($_GET['sport'])) {
    header('Location: 404.php');
    exit();
}

setlocale(LC_TIME, "fr_FR", "fra");
$date_format = '%A %d %B %Y';

?>

<?php include '../elements/top.php' ?>

<body class="d-flex flex-column min-vh-100">
    <?php include '../elements/header.php' ?>

    <div class="row justify-content-center m-0 p-0">
        <?php
        $i = 0;
        foreach ($flux as $value) { ?>
            <div class="card col-lg-3 col-11 p-0 mt-3 mx-4 shadow-sm p-3 mb-5 bg-body rounded">
                <img src="<?= $value->enclosure['url'] ?>" alt="image couverture" class="image">
                <div class="card-body">
                    <a href="<?= $value->link ?>" class="text-decoration-none text-dark">
                        <p class="card-title"><?= $value->title ?> ...voir plus</p>
                    </a>
                    <p class="text-dark"><?= strftime($date_format, strtotime($value->pubDate)) ?></p>
                    <button type="button" class="btn bouton" data-bs-toggle="modal" data-bs-target="#modal1<?= $i ?>">
                    <i class="bi bi-zoom-in"></i>
                    </button>
                </div>
            </div>

            <div class="modal fade" id="modal1<?= $i ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <p class=" fw-bold fs-5 text-dark">Toutes les infos sur les sports d'hiver</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="card-title text-dark"><?= $value->title ?></p>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn bouton"><a class="text-dark text-decoration-none" href="<?= $value->link ?>">Article</a></button>
                            <button type="button" class="btn bouton" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            $i++;
        } ?>
    </div>


    <?php include '../elements/footer.php' ?>
</body>

</html>