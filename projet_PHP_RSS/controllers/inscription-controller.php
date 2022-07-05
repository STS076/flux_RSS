<?php

$showForm = true;

// lance les test uniquement lors de la validation du formulaire de type POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // déclare un tableau d'erreur
    $errors = [];

    // déclare les regex 
    $regexName = "/^[a-zA-Z-éèëêâäàöôûùüîïç]+$/";

    // isset permet de vérifier si la variable existe
    if (isset($_POST['surname'])) {
        if ($_POST['surname'] == '') {
            // si vide, créé une clef dans le tableau d'erreur
            $errors['surname'] = "* Veuillez rentrer un nom";
        } else if (!preg_match($regexName, $_POST['surname'])) {
            $errors['surname'] = "* format invalide";
        }
    }

    if (isset(($_POST['firstname']))) {
        if ($_POST['firstname'] == '') {
            $errors['firstname'] = "* Veuillez rentrer un prénom";
        } else if (!preg_match($regexName, $_POST['firstname'])) {
            $errors['firstname'] = "* format invalide";
        }
    }

    // pour les adresses email, pas besoin de regex, fonction automatique PHP

    if (isset($_POST['emailAddress'])) {
        if ($_POST['emailAddress'] == '') {
            $errors['emailAddress'] = "* Veuillez rentrer une adresse email";
        } else if (!filter_var($_POST['emailAddress'], FILTER_VALIDATE_EMAIL)) {
            $errors['emailAddress'] = "* format invalide";
        }
    }

    if (isset($_POST['password'])) {
        if ($_POST['password'] == '') {
            $errors['password'] = "* Veuillez rentrer un mot de passe";
        } else if ($_POST['confirmPassword'] == '' && $_POST['password'] != '') {
            $errors['confirmPassword'] = "* Veuillez rentrer un mot de passe";
        } else if ($_POST['confirmPassword'] != $_POST['password']) {
            $errors['confirmPassword'] = "* Veuillez confirmer un mot de passe identique au précédent";
        }
    }


    if (!isset($_POST['formule'])) {
        $errors['formule'] = "* Veuillez choisir une formule";
    }

    if (!isset($_POST['checkbox'])) {
        $errors['checkbox'] = "* Veuillez valider les conditions générales d'utilisation";
    }

    if (count($errors) == 0) {
        $showForm = false;
    }

}

function safeInput($input){
    $safeInput = trim($input); 
    $safeInput = htmlspecialchars(($safeInput)); 
    return $safeInput;
}




