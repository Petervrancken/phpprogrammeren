<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "autoload.php";

if ( LoginCheck() ) {
    print "Het inloggen is gelukt.";
} else {
    print "Helaas, het ingloggen is niet gelukt.";
}

function LoginCheck():bool
{
    if ( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        //controle CSRF token
        if ( ! key_exists("csrf", $_POST)) die("Missing CSRF");
        if ( ! hash_equals( $_POST['csrf'], $_SESSION['lastest_csrf'] ) ) die("Problem with CSRF");

        $_SESSION['lastest_csrf'] = "";

        //sanitization
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER']; // http_referer, zien waar we vandaan komen

        //Validaties voor het loginformulier
        // als er geen key usr_email in $_post zit + extra controle op lengte. Geef een foutmelding.
        if ( ! key_exists("usr_email", $_POST ) OR strlen($_POST['usr_email']) < 5 )
        {
            $_SESSION['errors']['usr_password'] = "Het wachtwoord is niet correct ingevuld";
        }
        if ( ! key_exists("usr_password", $_POST ) OR strlen($_POST['usr_password']) < 8 )
        {
            $_SESSION['errors']['usr_password'] = "Het wachtwoord is niet correct ingevuld";
        }

        //terugkeren naar afzender als er een fout is
        if ( key_exists("errors" , $_SESSION ) AND count($_SESSION['errors']) > 0 )
        {   // als er een foutmelding is terugkeren naar vorige pagina en
            $_SESSION['OLD_POST'] = $_POST;
            header( "Location: " . $sending_form_uri ); exit(); // als foutmelding terugkeren naar vorige pagina,
                                                                    //exit() = stop lezen van de code.
        }

        //search user in database
        $email = $_POST['usr_email'];
        $ww = $_POST['usr_password'];

        $sql = "SELECT * FROM user WHERE usr_email='$email' ";
        $data = GetData($sql);

        if ( count($data) > 0 )
        {
            foreach ( $data as $row )
            {
                if ( password_verify( $ww, $row['usr_password'] ) ) return true;
            }
        }

        return false;
    }
}