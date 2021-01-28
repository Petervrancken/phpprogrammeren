<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//inlog niet nodig, public access true is toegang, anders krijg je autmatisch geen toegang
$public_access = true;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "No access", $subtitle = "" );

print '<div class="msgs alert alert-success mt-2" role="alert">U hebt geen toegang! <a href=login.php>Log in</a></div>';
?>
