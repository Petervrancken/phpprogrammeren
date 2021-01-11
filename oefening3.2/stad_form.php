<?php

require_once "lib/pdo.php";
require_once "lib/html_functions.php";



PrintHead();
PrintJumbo( $title = "Bewerk afbeelding", $subtitle = "" );

?>


<div class="container">
    <div class="row">
        <?php


        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        $rows = GetData( "select * from images where img_id=" . $_GET['img_id'] );

        //get template
        $template = file_get_contents("templates/form.html");

        $merge = MergeViewWithData($template, $rows);
        print $merge;


        ?>

    </div>
</div>

</body>
</html>
