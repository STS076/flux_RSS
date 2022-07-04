<?php session_start() ?>
<?php include '../elements/top.php' ?>

<body>
    <?php include '../elements/header.php' ?>
    <div class="container bg-light">
        <div class="row justify-content-center">

            <?php
            $fluxRSS = "https://rmcsport.bfmtv.com/rss/cyclisme/tour-de-france/";
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

                $sports = $rss->channel->item;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            ?>
            <?php if (isset($sports)) {
                setlocale(LC_TIME, "fr_FR", "fra");
                $date_format = '%A %d %B %Y';

                foreach ($sports as $value) { ?>

                    <div class="card col-lg-4 col-11 p-0 m-5">
                        <img src="<?= $value->enclosure['url'] ?>" alt="image couverture" class="image">
                        <div class="card-body">
                            <p class="card-title"><?= $value->title ?></p>
                            <p><?= strftime($date_format, strtotime($value->pubDate)) ?></p>
                            <div class="d-flex justify-content-evenly">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $value->enclosure['url'] ?>">
                                    Launch demo modal
                                </button>
                                <a href="<?= $value->link ?>" class="btn btn-secondary">Article</a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            <?php } ?>

        </div>
    </div>

    <div class="modal fade" id="<?= $value->enclosure['url'] ?>" tabindex="-1" ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="<?= $value->title ?>">Modal title
                    <p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>s
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <?php include '../elements/footer.php' ?>

</body>

</html>