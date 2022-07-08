<?php
session_start();

require_once '../controllers/inscription-controller.php';

?>
<?php include '../elements/top.php' ?>

<body>
    <?php include '../elements/header.php' ?>

    <?php if ($showForm) { ?>

        <h1 class="m-5 text-center">Formulaire de contact</h1>

        <form action="" method="POST">

            <div class="container d-flex align-items-center flex-column  subway mt-1 mb-4 p-5 border border-dark shadow" id="page">
                <div>
                    <span class="fs-4 ms-4 pb-3">Veuillez rentrer les informations ci-dessous afin de vous inscrire : </span>
                </div>

                <div class=" form-group col-lg-6 col-12 my-3 text-center">
                    <label>Nom:</label>
                    <input class="text-center form-control" placeholder="Nom" id="surname" value="<?= isset($_POST['surname']) ? $_POST['surname'] : '' ?>" name="surname">
                    <p class="text-danger" id="errorsurname"><?= isset($errors['surname']) ? $errors['surname'] : '' ?></p>
                </div>

                <div class="form-group col-lg-6 col-12 my-3 text-center">
                    <label>Prénom:</label>
                    <input class="text-center form-control" placeholder="Prénom" id="firstname" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">
                    <p class="text-danger" id="errorname"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></p>
                </div>

                <div class="form-group col-lg-6 col-12 my-3 text-center">
                    <label>Adresse email:</label>
                    <input class="text-center form-control" id="emailAddress" placeholder="Email" name="emailAddress" value="<?= isset($_POST['emailAddress']) ? $_POST['emailAddress'] : '' ?>">
                    <p class="text-danger" id="erroremailAddress"><?= isset($errors['emailAddress']) ? $errors['emailAddress'] : '' ?></p>
                </div>

                <div class="form-group col-lg-6 col-12 my-3 text-center">
                    <label>Mot de passe:</label>
                    <input type="password" class="text-center form-control" id="password" placeholder="Mot de passe" name="password">
                    <p class="text-danger" id="errorpassword"><?= isset($errors['password']) ? $errors['password'] : '' ?></p>
                </div>

                <div class="col-lg-6 col-12 my-3 form-group my-3 text-center">
                    <label>Confirmer votre mot de passe:</label>
                    <input type="password" class="text-center form-control" id="confirmPassword" placeholder="Confirmer votre mot de passe" name="confirmPassword">
                    <p class="text-danger" id="errorconfirmPassword"><?= isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '' ?></p>
                </div>

                <div class="col-lg-6 col-12 my-3 form-group my-3 text-center">
                    <label for="formula">Abonnement :</label>
                    <select class="text-center" name="formule" id="formule">
                        <option selected disabled>Veuillez sélectionner une formule</option>
                        <option value="1">Etudiant</option>
                        <option value="2">Normal</option>
                        <option value="3">Premium</option>
                    </select>
                    <p class="text-danger" id="formule"><?= isset($errors['formule']) ? $errors['formule'] : '' ?></p>
                </div>

                <div class="row text-center">
                    <div class="col-lg-12 col-12 my-3">
                        <p>J'ai lu et j'accèpte les conditions générales d'utilisation :</p>
                        <input type="checkbox" id="checkbox" name="checkbox" value="<?= isset($_POST['checkbox']) ? $_POST['checkbox'] : '' ?>">
                        <p class="text-danger" id="errorcheckbox"><?= isset($errors['checkbox']) ? $errors['checkbox'] : '' ?></p>
                    </div>
                </div>

                <div class="my-3 text-center">
                    <button class="btn btn-light" id="submit" name="submit">S'inscrire</button>
                </div>

                <div class="row text-center inscrit mt-3">
                    <p>Déjà inscrit?<a href="login.php"><span class="text-decoration-underline ms-1">Se connecter</span></a></p>
                </div>
            </div>
        </form>

    <?php } else { ?>

        <h1 class="text-center mb-4 p-5 bg-dark text-white">PAGE USER</h1>

        <div class="text-center">
            <p> Bonjour, <?= safeInput($_POST['firstname']) ?> <?= safeInput($_POST['surname']) ?>, merci de votre instription pour la formule <?= $arrayFormula[safeInput($_POST['formule'])] ?>.<br>
                Un email de confirmation a été envoyé à l'adresse suivante : <?= safeInput($_POST['emailAddress']) ?>
            </p>
        </div>

        <p class="text-center">Nous vous recontacterons dans les plus bref délais</p>

        <div class="row text-center">
            <a href="index.php" class="btn btn-dark">Retour</a>
        </div>

    <?php } ?>

    <?php include '../elements/footer.php' ?>

</body>

</html>