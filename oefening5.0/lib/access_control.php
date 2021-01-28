<?php


// script om te kijken of je gebruiker is ingelogd, zo niet, welke toegang hij heeft tot bepaalde pagina's
CheckAccess();

function CheckAccess()
{
    global $public_access;

    if ( ! $public_access AND ! isset($_SESSION['user']) )
    {
        GoToNoAccess();
    }
}

function GoToNoAccess()
{   // app_root staat in autoload map zoeken vanaf the main folder.
    global $app_root;

    header("Location: " . $app_root . "/no_access.php");
    exit;
}