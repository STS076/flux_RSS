<?php session_start();

?>
<?php include '../elements/top.php' ?>

<body>
    <?php include '../elements/header.php' ?>

    <div class="container bg-light">
        <div class="row justify-content-center">


            <!-- flux RSS hiver -->
            <?php
            $fluxRSS = "https://rmcsport.bfmtv.com/rss/sports-extremes/";
            function recupXML($url)
            {
                if (!@$rss = simplexml_load_file($url)) {
                    throw new Exception('Flux introuvable');
                } else {
                    return $rss;
                }
            }

            try {

                $rss = recupXML($fluxRSS);
                $extreme = $rss->channel->item;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            ?>

            <!-- flex rss extreme -->
            <?php
            $fluxRSS2 = "https://rmcsport.bfmtv.com/rss/sports-d-hiver/";
            function recupXML2($url)
            {
                if (!@$rss2 = simplexml_load_file($url)) {
                    throw new Exception('Flux introuvable');
                } else {
                    return $rss2;
                }
            }

            try {

                $rss2 = recupXML2($fluxRSS2);
                $hiver = $rss2->channel->item;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            ?>

            <!-- flex rss jeux olympiques -->
            <?php
            $fluxRSS3 = "https://rmcsport.bfmtv.com/rss/jeux-olympiques/";
            function recupXML3($url)
            {
                if (!@$rss3 = simplexml_load_file($url)) {
                    throw new Exception('Flux introuvable');
                } else {
                    return $rss3;
                }
            }

            try {

                $rss3 = recupXML3($fluxRSS3);
                $olympics = $rss3->channel->item;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            ?>
            <!-- fetch flux rss -->

            <!-- caroussel -->
            <div id="carouselExampleCaptions" class=" carousel slide mt-4" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="col-lg-10 col-11 carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= $hiver->enclosure['url'] ?>" class="d-block w-100" alt="image couverture hiver">
                        <div class="carousel-caption d-none d-md-block">
                            <a href="<?= $hiver->link ?>" class="text-decoration-none text-white fs-4">
                                <p class="card-title blanc"><?= $hiver->title ?> ...voir plus</p>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $extreme->enclosure['url'] ?>" class="d-block w-100" alt="image couverture extreme">
                        <div class="carousel-caption d-none d-md-block">
                            <a href="<?= $extreme->link ?>" class="text-decoration-none text-dark fs-4">
                                <p class="card-title blanc"><?= $extreme->title ?> ...voir plus</p>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= $olympics->enclosure['url'] ?>" class="d-block w-100" alt="image couverture olympiques">
                        <div class="carousel-caption d-none d-md-block">
                            <a href="<?= $olympics->link ?>" class="text-decoration-none text-white fs-4">
                                <p class="card-title blanc"><?= $olympics->title ?> ...voir plus</p>
                            </a>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- caroussel -->


            <?php
            setlocale(LC_TIME, "fr_FR", "fra");
            $date_format = '%A %d %B %Y';
            for ($index = 1; $index <= 3; $index++) { ?>
                <div class="card col-lg-4 col-11 p-0 m-4">
                    <img src="<?= $hiver[$index]->enclosure['url'] ?>" alt="image couverture" class="image">
                    <div class="card-body">
                        <a href="<?= $hiver[$index]->link ?>" class="text-decoration-none text-dark">
                            <p class="card-title"><?= $hiver[$index]->title ?> ...voir plus</p>
                        </a>
                        <p><?= strftime($date_format, strtotime($hiver[$index]->pubDate)) ?></p>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal<?= $index ?>">
                            info 1
                        </button>
                    </div>
                </div>
                <!-- modale -->
                <div class="modal fade" id="modal<?= $index ?>" tabindex="-1">
                    <div class=" modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="card-title"><?= $hiver[$index]->title ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- modale -->
            <?php } ?>
            <!-- fin boucle hiver -->


            <?php
            setlocale(LC_TIME, "fr_FR", "fra");
            $date_format = '%A %d %B %Y';

            for ($index2 = 1; $index2 <= 3; $index2++) { ?>
                <div class="card col-lg-4 col-11 p-0 m-4">
                    <img src="<?= $extreme[$index2]->enclosure['url'] ?>" alt="image couverture" class="image">
                    <div class="card-body">
                        <a href="<?= $extreme[$index2]->link ?>" class="text-decoration-none text-dark">
                            <p class="card-title"><?= $extreme[$index2]->title ?></p>
                        </a>
                        <p><?= strftime($date_format, strtotime($extreme[$index2]->pubDate)) ?></p>

                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal<?= $index2 ?>">
                            info 2
                        </button>

                    </div>
                </div>

                <!-- modale -->
                <div class="modal fade" id="modal<?= $index2 ?>" tabindex="-1">
                    <div class=" modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="card-title"><?= $extreme[$index2]->title ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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

            for ($index3 = 1; $index3 <= 3; $index3++) { ?>
                <div class="card col-lg-4 col-11 p-0 m-4">
                    <img src="<?= $olympics[$index3]->enclosure['url'] ?>" alt="image couverture" class="image">
                    <div class="card-body">
                        <a href="<?= $olympics[$index3]->link ?>" class="text-decoration-none text-dark">
                            <p class="card-title"><?= $olympics[$index3]->title ?> ...voir plus</p>
                        </a>
                        <p><?= strftime($date_format, strtotime($olympics[$index3]->pubDate)) ?></p>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal<?= $index3 ?>">
                            info 3
                        </button>

                    </div>
                </div>
                <!-- modale -->
                <div class="modal fade" id="modal<?= $index3 ?>" tabindex="-1">
                    <div class=" modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p class="card-title"><?= $olympics->title ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- modale -->
            <?php } ?>

            <!-- fin boucle olympiques -->
        </div>
        <!-- fin row -->
    </div>
    <!-- fin container -->






    <?php include '../elements/footer.php' ?>

</body>

</html>