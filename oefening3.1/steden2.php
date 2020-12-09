
<?php

// haal gegevens van pdo.php
require_once "lib/pdo.php";

//haal gegevens van html_fucntion.php
require_once "lib/html_fucntion.php";



// print head funtie bij html_function
PrintHead();

// print jumbo funcite bij html_function
PrintJumbo( $title = "City Dreams" ,
    $subtitle = "Beste steden om naartoe te reizen!" );


?>




<div class="container">
    <div class="row">
        <?php


        // getdata van de databank via functie met sql selectie
        $rows = GetData( "select * from images" );
        $template = file_get_contents("templates/columnsteden.html");

        // de bovenstaande template en rows worden in de functie geplaatst en verwerkt (merge)
        $html = MergeViewWithData( $template, $rows );
        print $html;


        ?>
    </div>
</div>

</body>
</html>
