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


                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="darkMode" name="darkMode" <?= isset($_COOKIE['darkMode']) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="darkMode">Mode dark</label>
                    </div>

                        <p class="text-center mt-3">Nombre d'articles affichés sur la page d'accueil :</p>


                    <p>Nombre d'articles affichés sur la page d'accueil</p>


                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="cards6" id="nbArticle6" name="myNb" <?= isset($_COOKIE['myNb']) ? ($_COOKIE['myNb'] == 'cards6' ? 'checked' : '') : '' ?>>
                        <label class="form-check-label" for="nbArticle6">
                            nombre d'articles affichés 6
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="cards9" id="nbArticle9" name="myNb" <?= isset($_COOKIE['myNb']) ? ($_COOKIE['myNb'] == 'cards9' ? 'checked' : '') : '' ?>>
                        <label class="form-check-label" for="nbArticle9">
                            nombre d'articles affichés 9
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="cards12" id="nbArticle12" name="myNb" <?= isset($_COOKIE['myNb']) ? ($_COOKIE['myNb'] == 'cards12' ? 'checked' : '') : '' ?>>
                        <label class="form-check-label" for="nbArticle12">
                            nombre d'articles affichés 12
                        </label>
                    </div>




                    <div>
                        <p>Choississez 3 favoris</p>
                    </div>

                    <div>
                        <input class="myCheckbox" type="checkbox" value="0" name="choice[]" <?= setCheckbox("0", 'choixSport', 'checked') ?>>
                        <label for="cyclisme">Cyclisme</label>

                        <input class="myCheckbox" type="checkbox" value="1" name="choice[]" <?= setCheckbox("1", 'choixSport', '') ?>>
                        <label for="hiver">Sport d'Hivers</label>

                        <input class="myCheckbox" type="checkbox" value="2" name="choice[]" <?= setCheckbox("2", 'choixSport', '') ?>>
                        <label for="extreme">Sport Extême</label>


                        <input class="myCheckbox" type="checkbox" value="3" name="choice[]" <?= setCheckbox("3", 'choixSport', 'checked') ?>>
                        <label for="olympique">Jeux Olympique</label>

                        <input class="myCheckbox" type="checkbox" value="4" name="choice[]" <?= setCheckbox("4", 'choixSport', 'checked') ?>>
                        <label for="Voile">Voile</label>

                    </div>

                        <div class="d-flex justify-content-center">
                            <button class="my-4 btn bouton">Valider</button>
                        </div>


                    </div>
                </div>
            </fieldset>
        </div>
    </form>







    <script src="../assets/script/script.js"></script>
    <?php include '../elements/footer.php' ?>

</body>

</html>