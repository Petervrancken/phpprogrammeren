
<?php


require_once "lib/pdo.php";
require_once "lib/html_fucntion.php";


PrintHead();
PrintJumbo();

?>




<div class="container">
    <div class="row">
        <?php



        $rows = GetData( "select * from images" );
        $template = file_get_contents("templates/columnsteden.html");


        $html = MergeViewWithData( $template, $rows );
        print $html;


        ?>
    </div>
</div>

</body>
</html>
