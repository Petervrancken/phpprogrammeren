<?php

require_once "pdo.php";



SaveFormData();



function SaveFormData()
{
    // verzamel de data na je HTML FORM te submitten
    // controleer of het met POST verzonden is
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        var_dump($_POST);
        $table = $pkey = $update = $insert = $where = $str_keys_values = "";

        //als de sleutel in de key niet bestaal, stop en geef missing table of missing key
        if (!key_exists("table", $_POST)) die("Missing table");
        if (!key_exists("pkey", $_POST)) die("Missing pkey");

        // hier slaag je de key op in een variablen
        $table = $_POST['table'];
        $pkey = $_POST['pkey'];

        //insert or update? Als pkey is ingevuld 1 > 0 dan ben je met een update bezig
        // als pkey 0 is dan zit je met een insert, dit is een aanvulling zonder pkey
        if ($_POST["$pkey"] > 0) $update = true;
        else $insert = true;

        // update voegt data toe in $table
        // insert voegt data toe in $table zonder pkey
        if ($update) $sql = "UPDATE $table SET ";
        if ($insert) $sql = "INSERT INTO $table SET ";


        //make key-value string part of SQL statement
        $keys_values = [];
        foreach ($_POST as $field => $value) {
            //skip non-data fields
            if (in_array($field, ['table', 'pkey', 'afterinsert', 'afterupdate'])) continue;

            //handle primary key field
            if ($field == $pkey) {
                if ($update) $where = " WHERE $pkey = $value ";
                continue;
            }

            //all other data-fields een array van alle data dat je opvraagd
            $keys_values[] = " $field = '$value' ";
        }

        // implode gaat de string scheiden met een komma
        // maak van een array een string
        $str_keys_values = implode(" , ", $keys_values);

        //plak $sql
        $sql .= $str_keys_values;

        //extend SQL with WHERE
        $sql .= $where;

        //run SQL staat in connectie met functie in pdo.php
        $result = ExecuteSQL($sql);

        //output if not redirected
        print $sql;
        print "<br>";
        print $result->rowCount() . " records affected";


        // na de insert stuur deze code je automatisch terug naar de aangegeven bestemming
        // deze bestemming staat in from.html in uw metadata
        if ( $insert AND $_POST["afterinsert"] > "" ) header("Location: ../" . $_POST["afterinsert"] );
        if ( $update AND $_POST["afterupdate"] > "" ) header("Location: ../" . $_POST["afterupdate"] );

    }
}