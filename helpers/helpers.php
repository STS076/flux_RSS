<?php
/**
 * Function permettant de définir le statut de la checkbox en fonction du post ou cookie : checked ou non
 * 
 * @param int $valueCheckbox Valeur de la checkbox
 * @param string $cookieName Nom du cookie
 * @param string $default Optionnal, paramètre par defaut
 * @return string Statut de la checkbox
 */
function setCheckbox( $valueCheckbox, string $cookieName, string $default = ''): string
{
    // Nous definissons une variable $checkbox qui sera égale à un string vide
    $checkbox = '';
    if (isset($_POST['choices'])) {
        if (in_array($valueCheckbox, $_POST['choices'])) {
            $checkbox = 'checked';
        }
    } else if (isset($_COOKIE[$cookieName])) {
        if (strpos($_COOKIE[$cookieName], $valueCheckbox) !== false) {
            $checkbox = 'checked';
        }
    } else {
        $checkbox = $default;
    }
    return $checkbox;
}