<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "autoload.php";

if ( LoginCheck() ) {
    print "Het inloggen is gelukt.";
} else {
    print "Helaas, het ingloggen is niet gelukt.";
}


function loginCheck()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //controle CSRF token
       //if (!key_exists("csrf", $_POST)) die("Missing CSRF");
       //if (!hash_equals($_POST['csrf'], $_SESSION['last_csrf'])) die("Problem with CSRF");


        //sanitization

        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        //validation

        $sending_form_uri = $_SERVER['HTTP_REFERER'];
        $email = $_POST['usr_email'];
        $password = $_POST['usr_password'];

        //Protect MySQL injection



        //Check if user exists

        $data = getData("SELECT usr_email FROM user WHERE usr_email = '".$email."'");
        if($data != null ){
            return true;
        } else {
            return false;
        }
    }
}