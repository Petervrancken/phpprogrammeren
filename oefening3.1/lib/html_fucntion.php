<?php
function PrintHead()
{
    $head = file_get_contents("templates/head.html");
    print $head;
}

function PrintJumbo($title = "City dreams", $slogan = "Travel to your favorite location!")
{
    if ($_SERVER["PHP_SELF"] == '/phpprogrammeren/oefening3.1/steden2.php') {
        $jumbo = file_get_contents("templates/jumbotron.html");
        $jumbo = str_replace("@citytitle@", $title, $jumbo);
        $jumbo = str_replace("@slogan@", $slogan, $jumbo);
        print $jumbo;
    }
    else{
        $title = "Invullen";
        $jumbo = file_get_contents("templates/jumbotron.html");
        $jumbo = str_replace("@citytitle@", $title, $jumbo);
        $jumbo = str_replace("@slogan@", '', $jumbo);
        print $jumbo;

    }

}


function MergeViewWithData( $template, $data )
{
    $returnvalue = "";

    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }

    return $returnvalue;
}


?>