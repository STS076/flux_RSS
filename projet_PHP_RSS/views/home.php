<?php session_start();
require_once '../controllers/home-controller.php'; 

?>
<?php include '../elements/top.php' ?>

<body>
    <?php include '../elements/header.php' ?>
    <!-- <div class="container"> -->
    <div class="row justify-content-center m-0 p-0">





        <!-- caroussel -->
        <div class="col-lg-10 col-12 m-0 p-0">
            <div id="carouselExampleCaptions" class="container carousel slide mt-4" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="col-lg-8 col-12 carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= $array[0]->enclosure['url'] ?>" class="d-block w-100" alt="image couverture olympiques">
                        <div class="carousel-caption ">
                            <a href="<?= $array[0]->link ?>" class="text-decoration-none text-white fs-4">
                                <p class="card-title "><?= $array[0]->title ?> ...voir plus</p>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $array[1]->enclosure['url'] ?>" class="d-block w-100" alt="image couverture olympiques">
                        <div class="carousel-caption ">
                            <a href="<?= $array[1]->link ?>" class="text-decoration-none text-white fs-4">
                                <p class="card-title "><?= $array[1]->title ?> ...voir plus</p>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $array[2]->enclosure['url'] ?>" class="d-block w-100" alt="image couverture olympiques">
                        <div class="carousel-caption ">
                            <a href="<?= $array[2]->link ?>" class="text-decoration-none text-white fs-4">
                                <p class="card-title "><?= $array[2]->title ?> ...voir plus</p>
                            </a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev m-0 p-0" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next m-0 p-0" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- caroussel -->
        <?php
        setlocale(LC_TIME, "fr_FR", "fra");
        $date_format = '%A %d %B %Y';
        for ($index = 1; $index <= 3; $index++) { ?>
            <div class="card col-lg-3 col-11 p-0 mt-3 mx-4">
                <img src="<?= $array[0][$index]->enclosure['url'] ?>" alt="image couverture" class="image">
                <div class="card-body">
                    <a href="<?= $array[0][$index]->link ?>" class="text-decoration-none text-dark">
                        <p class="card-title"><?= $array[0][$index]->title ?> ...voir plus</p>
                    </a>
                    <p class="text-dark"><?= strftime($date_format, strtotime($array[0][$index]->pubDate)) ?></p>
                    <button type="button" class="btn bouton" data-bs-toggle="modal" data-bs-target="#modal1<?= $index ?>">
                        <i class="bi text-dark bi-bookmark"></i>
                    </button>
                </div>
            </div>
            <!-- modale -->
            <div class="modal fade" id="modal1<?= $index ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <p class=" fw-bold fs-5 text-dark">Toutes les infos sur les sports d'hiver</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="card-title text-dark"><?= $array[0][$index]->title ?></p>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn bouton"><a class="text-dark text-decoration-none" href="<?= $array[0][$index]->link ?>">Article</a></button>
                            <button type="button" class="btn bouton" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modale -->
        <?php } ?>



        <?php
        if (isset($_COOKIE['myNb'])) {
            $test = $_COOKIE['myNb'] / 3;
        } else {
            $test = 3;
        }


        ?>


        <!-- fin boucle hiver -->
        <?php
        setlocale(LC_TIME, "fr_FR", "fra");
        $date_format = '%A %d %B %Y';
        for ($index = 1; $index <= $test; $index++) { ?>
            <div class="card col-lg-3 col-11 p-0 mt-3 mx-4">
                <img src="<?= $array[1][$index]->enclosure['url'] ?>" alt="image couverture" class="image">
                <div class="card-body">
                    <a href="<?= $array[1][$index]->link ?>" class="text-decoration-none text-dark">
                        <p class="card-title"><?= $array[1][$index]->title ?></p>
                    </a>
                    <p class="text-dark"><?= strftime($date_format, strtotime($array[1][$index]->pubDate)) ?></p>
                    <button type="button" class="btn bouton" data-bs-toggle="modal" data-bs-target="#modal2<?= $index ?>">
                        <i class="bi text-dark bi-bookmark"></i>
                    </button>
                </div>
            </div>
            <!-- modale -->
            <div class="modal fade" id="modal2<?= $index ?>" tabindex="-1">
                <div class=" modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class=" fw-bold fs-5 text-dark">Toutes les infos sur les sports extrêmes</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="card-title text-dark"><?= $array[1][$index]->title ?></p>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn bouton"><a class="text-dark text-decoration-none" href="<?= $array[1][$index]->link ?>">Article</a></button>
                            <button type="button" class="btn bouton" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modale -->
        <?php } ?>
        <!-- fin boucle extrème -->
        <?php
        setlocale(LC_TIME, "fr_FR", "fra");
        $date_format = '%A %d %B %Y';
        for ($index = 1; $index <= $test; $index++) { ?>
            <div class="card col-lg-3 col-11 p-0 mt-3 mx-4">
                <img src="<?= $array[2][$index]->enclosure['url'] ?>" alt="image couverture" class="image">
                <div class="card-body ">
                    <a href="<?= $array[2][$index]->link ?>" class="text-decoration-none text-dark">
                        <p class="card-title"><?= $array[2][$index]->title ?> ...voir plus</p>
                    </a>
                    <p class="text-dark"><?= strftime($date_format, strtotime($array[3][$index]->pubDate)) ?></p>
                    <button type="button" class="btn bouton" data-bs-toggle="modal" data-bs-target="#modal3<?= $index ?>">
                        <i class="bi text-dark bi-bookmark"></i>
                    </button>
                </div>
            </div>
            <!-- modale -->
            <div class="modal fade" id="modal3<?= $index ?>" tabindex="-1">
                <div class=" modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class=" fw-bold fs-5 text-dark">Toutes les infos sur les jeux olympiques</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="card-title text-dark"><?= $array[2][$index]->title ?></p>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn bouton"><a class="text-dark text-decoration-none" href="<?= $array[2][$index]->link ?>">Article</a></button>
                            <button type="button" class="btn bouton" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modale -->
        <?php } ?>
        <!-- fin boucle olympiques -->
    </div>
    <!-- fin row -->
    <!-- </div> -->
    <!-- fin container -->
    <?php include '../elements/footer.php' ?>
</body>

</html>