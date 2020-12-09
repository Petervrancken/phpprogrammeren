<?php
// deze code geeft een error weer in je browers als je iets verkeerd doet
error_reporting(E_ALL);
ini_set('display_errors', 1);


//haalt data uit connection_data.php
require_once "connection_data.php";



//functie ok connectie te maken met de database
function CreateConnection()
{
    // global neemt een variabele vanbuiten de functie
    global $conn;
    global $servername, $dbname, $username, $password;

    // Create and check connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}



// deze functie haalt data uit je databank
function GetData( $sql )
{
    global $conn;


    // haalt private data uit een functie om connectie te maken en verifieren
    CreateConnection();

    //define and execute query
    $result = $conn->query( $sql );

    //show result (if there is any)
    if ( $result->rowCount() > 0 )
    {
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    else
    {
        return [];
    }

}

// deze functie word doorgegeven naar save.php
function ExecuteSQL( $sql )
{
    global $conn;

    CreateConnection();

    //define and execute query
    $result = $conn->query( $sql );

    return $result;
}
?>