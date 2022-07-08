<?php

if (!isset($_SESSION['user'])) {
    header('Location: ../views/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    setcookie("myNb", $_POST['myNb'], time() + 3600);

    if (isset($_POST['darkMode'])) {
        setcookie("darkMode", $_POST['darkMode'], time() + 3600);
    } else {
        setcookie("darkMode", '', time() - 3600);
    }


    if (isset($_POST['choice'])) {
        $choices = implode("-", $_POST['choice']);
        setcookie('choixSport', $choices, time() + 3600);
    }

    header('Location: ../views/parameters.php');
}
