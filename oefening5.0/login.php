<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//inlog niet nodig, public access true is toegang, anders krijg je autmatisch geen toegang
$public_access = true;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Login", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php
        foreach ( $msgs as $msg){
            print '<div class="msgs alert alert-success" role="alert">' . $msg . '</div>';
        }

        //get data
        $data = [ 0 => [ "usr_email" => "", "usr_password" => "" ]];

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "login.php"  );


        //get template
        $output = file_get_contents("templates/login.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );

        print $output;
        ?>

    </div>
</div>

</body>
</html>