<?php session_start();


?>
<?php include '../elements/top.php' ?>

<body>
    <?php include '../elements/header.php' ?>
    <!-- <div class="container"> -->
    <div class="row justify-content-center m-0 p-0">


        <?php
        $fluxRSS = [
            'https://rmcsport.bfmtv.com/rss/cyclisme/tour-de-france/',
            'https://rmcsport.bfmtv.com/rss/sports-d-hiver/',
            'https://rmcsport.bfmtv.com/rss/sports-extremes/',
            'https://rmcsport.bfmtv.com/rss/jeux-olympiques/',
            'https://rmcsport.bfmtv.com/rss/voile/',
            
        ];


        setlocale(LC_TIME, "fr_FR", "fra");
        $date_format = '%A %d %B %Y';
        function recupXML($url)
        {
            if (!@$rss = simplexml_load_file($url)) {
                throw new Exception('Flux introuvable');
            } else {
                return $rss;
            }
        }

        $array = [];


        foreach ($fluxRSS as $value) {
            try {
                $rss = recupXML($value);
                array_push($array, $rss->channel->item);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        if (isset($_COOKIE['choixSport'])) {
            $arrayChoices = explode("-", $_COOKIE['choixSport']);
        } else {
            $arrayChoices = [0, 1, 2];
        }
        

        ?>


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
                        <img src="<?= $array[$arrayChoices[0]]->enclosure['url'] ?>" class="d-block w-100" alt="image couverture olympiques">
                        <div class="carousel-caption ">
                            <a href="<?= $array[$arrayChoices[0]]->link ?>" class="text-decoration-none text-white fs-4">
                                <p class="card-title "><?= $array[$arrayChoices[0]]->title ?> ...voir plus</p>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $array[$arrayChoices[1]]->enclosure['url'] ?>" class="d-block w-100" alt="image couverture olympiques">
                        <div class="carousel-caption ">
                            <a href="<?= $array[$arrayChoices[1]]->link ?>" class="text-decoration-none text-white fs-4">
                                <p class="card-title "><?= $array[$arrayChoices[1]]->title ?> ...voir plus</p>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $array[$arrayChoices[2]]->enclosure['url'] ?>" class="d-block w-100" alt="image couverture olympiques">
                        <div class="carousel-caption ">
                            <a href="<?= $array[$arrayChoices[2]]->link ?>" class="text-decoration-none text-white fs-4">
                                <p class="card-title "><?= $array[$arrayChoices[2]]->title ?> ...voir plus</p>
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
        if (isset($_COOKIE['myNb'])) {
            $test = ($_COOKIE['myNb'] / 3);
        } else {
            $test = 3;
        }

        ?>

        <?php
        for ($index = 1; $index <= $test; $index++) { ?>
            <div class="card col-lg-3 col-11 p-0 mt-3 mx-4 shadow-sm p-3 mb-5 bg-body rounded">
                <img src="<?= $array[$arrayChoices[0]][$index]->enclosure['url'] ?>" alt="image couverture" class="image">
                <div class="card-body">
                    <a href="<?= $array[$arrayChoices[0]][$index]->link ?>" class="text-decoration-none text-dark">
                        <p class="card-title"><?= $array[$arrayChoices[0]][$index]->title ?> ...voir plus</p>
                    </a>
                    <p class="text-dark"><?= strftime($date_format, strtotime($array[$arrayChoices[0]][$index]->pubDate)) ?></p>
                    <button type="button" class="btn bouton" data-bs-toggle="modal" data-bs-target="#modal1<?= $index ?>">
                    <i class="bi bi-zoom-in"></i>
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
                            <p class="card-title text-dark"><?= $array[$arrayChoices[0]][$index]->title ?></p>
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





        <!-- fin boucle hiver -->
        <?php
        for ($index = 1; $index <= $test; $index++) { ?>
            <div class="card col-lg-3 col-11 p-0 mt-3 mx-4 shadow-sm p-3 mb-5 bg-body rounded">
                <img src="<?= $array[$arrayChoices[1]][$index]->enclosure['url'] ?>" alt="image couverture" class="image">
                <div class="card-body">
                    <a href="<?= $array[$arrayChoices[1]][$index]->link ?>" class="text-decoration-none text-dark">
                        <p class="card-title"><?= $array[$arrayChoices[1]][$index]->title ?></p>
                    </a>
                    <p class="text-dark"><?= strftime($date_format, strtotime($array[$arrayChoices[1]][$index]->pubDate)) ?></p>
                    <button type="button" class="btn bouton" data-bs-toggle="modal" data-bs-target="#modal2<?= $index ?>">
                    <i class="bi bi-zoom-in"></i>
                    </button>
                </div>
            </div>
            <!-- modale -->
            <div class="modal fade" id="modal2<?= $index ?>" tabindex="-1">
                <div class=" modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class=" fw-bold fs-5 text-dark">Toutes les infos sur les sports extr??mes</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="card-title text-dark"><?= $array[$arrayChoices[1]][$index]->title ?></p>
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
        <!-- fin boucle extr??me -->
        <?php
        for ($index = 1; $index <= $test; $index++) { ?>
            <div class="card col-lg-3 col-11 p-0 mt-3 mx-4 shadow-sm p-3 mb-5 bg-body rounded">
                <img src="<?= $array[$arrayChoices[2]][$index]->enclosure['url'] ?>" alt="image couverture" class="image">
                <div class="card-body ">
                    <a href="<?= $array[$arrayChoices[2]][$index]->link ?>" class="text-decoration-none text-dark">
                        <p class="card-title"><?= $array[2][$index]->title ?> ...voir plus</p>
                    </a>
                    <p class="text-dark"><?= strftime($date_format, strtotime($array[$arrayChoices[2]][$index]->pubDate)) ?></p>
                    <button type="button" class="btn bouton" data-bs-toggle="modal" data-bs-target="#modal3<?= $index ?>">
                    <i class="bi bi-zoom-in"></i>
                    </button>
                </div>
            </div>
            <!-- modale -->
            <div class="modal fade" id="modal3<?= $index ?>" tabindex="-1">
                <div class=" modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class=" fw-bold fs-5 text-dark">Toutes les infos sur les jeux olympiques</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p class="card-title text-dark"><?= $array[$arrayChoices[2]][$index]->title ?></p>
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

    <?php include '../elements/footer.php' ?>
</body>

</html>