<?php

require_once "lib/pdo.php";
require_once "lib/html_fucntion.php";



PrintHead();
PrintJumbo();

?>


<div class="container">
    <div class="row">
        <?php

        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        $rows = GetData( "select * from images where img_id=" . $_GET['img_id'] );

        //get template
        $template = file_get_contents("templates/columnstad.html");

        //merge
        foreach ( $rows as $row )
        {
            $output = $template;

            foreach( array_keys($row) as $field )
            {
                $output = str_replace( "@$field@", $row["$field"], $output );
            }
            print $output;
        }

        ?>

    </div>
</div>

</body>
</html>
