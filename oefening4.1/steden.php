
<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
?>
<div class="container">
<?php
PrintJumbo( $title = "City Dreams" ,
    $subtitle = "Find the location you always dreamed off!" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php
        //get data
        $data = GetData( "select * from images" );

        //get template
        $template = file_get_contents("templates/column.html");

        //merge
        $output = MergeViewWithData( $template, $data );
        print $output;
        ?>

    </div>
</div>

</body>
</div>
</html>