<?php


//functie om titel en slogan aan te passen in jumbotron html.
function PrintJumbo( $title = "", $subtitle = "" )  // titel word in functie aangepast zie steden en stad.
{
    $jumbo = file_get_contents("templates/jumbotron.html");

    $jumbo = str_replace( "@citytitle@", $title, $jumbo );
    $jumbo = str_replace( "@slogan@", $subtitle, $jumbo );

    print $jumbo;
}




// functie om de head te printen van head.html
function PrintHead()
{
    $head = file_get_contents("templates/head.html");
    print $head;
}




// functie om data uit de databank te mergen met een ander document
// $template = een html bestand met variabelen in
// $data = data van databank dat de variabelen opvuld van je template
function MergeViewWithData( $template, $data )
{
    $returnvalue = "";

    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            //@$field@ is de naam van de table in databank, deze wordt hezelfde geschreven colums.html
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }

    return $returnvalue;
}


?>