<?php
session_start();

require_once '../controllers/parameters-controller.php';

require_once '../helpers/helpers.php';
?>

<?php include '../elements/top.php' ?>

<body class="d-flex flex-column min-vh-100">

    <?php include '../elements/header.php' ?>

    <h1 class="text-center mt-4">Paramètres</h1>


    <p class="text-center">Bonjour <?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['surname'] ?></p>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mt-2">
            <fieldset>
                <div class="row justify-content-center m-0 p-0">

                    <div class="col-lg-5 col-11">

                        <p class="mt-3 fs-5">Style du site :</p>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="darkMode" name="darkMode" <?= isset($_COOKIE['darkMode']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="darkMode">Mode Nuit</label>
                        </div>

                        <p class="mt-3 fs-5">Nombre d'articles affichés sur la page d'accueil :</p>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="6" id="nbArticle6" name="myNb" <?= isset($_COOKIE['myNb']) ? ($_COOKIE['myNb'] == '6' ? 'checked' : '') : '' ?>>
                            <label class="form-check-label" for="nbArticle6">
                                nombre d'articles affichés 6
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="9" id="nbArticle9" name="myNb" <?= isset($_COOKIE['myNb']) ? ($_COOKIE['myNb'] == '9' ? 'checked' : '') : '' ?>>
                            <label class="form-check-label" for="nbArticle9">
                                nombre d'articles affichés 9
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="12" id="nbArticle12" name="myNb" <?= isset($_COOKIE['myNb']) ? ($_COOKIE['myNb'] == '12' ? 'checked' : '') : '' ?>>
                            <label class="form-check-label" for="nbArticle12">
                                nombre d'articles affichés 12
                            </label>
                        </div>

                        <p class="mt-3 fs-5">Thématiques (3 obligatoires) :</p>

                        <div>
                            <form action="" method="POST">
                                <div>
                                    <input class="myCheckbox" type="checkbox" value="0" name="choice[]" <?= setCheckbox("0", 'choixSport', 'checked') ?>>
                                    <label for="cyclisme">Cyclisme</label>
                                </div>
                                <div>
                                    <input class="myCheckbox" type="checkbox" value="1" name="choice[]" <?= setCheckbox("1", 'choixSport', 'checked') ?>>
                                    <label for="hiver">Sport d'Hivers</label>
                                </div>
                                <div>
                                    <input class="myCheckbox" type="checkbox" value="2" name="choice[]" <?= setCheckbox("2", 'choixSport', 'checked') ?>>
                                    <label for="extreme">Sport Extême</label>
                                </div>
                                <div>
                                    <input class="myCheckbox" type="checkbox" value="3" name="choice[]" <?= setCheckbox("3", 'choixSport', '') ?>>
                                    <label for="olympique">Jeux Olympique</label>
                                </div>
                                <div>
                                    <input class="myCheckbox" type="checkbox" value="4" name="choice[]" <?= setCheckbox("4", 'choixSport', '') ?>>
                                    <label for="Voile">Voile</label>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="my-4 btn bouton">Valider</button>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>

    <?php include '../elements/footer.php' ?>

</body>

</html>