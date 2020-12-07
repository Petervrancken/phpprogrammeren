<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1>City dreams</h1>
    <p>Travel to your favorite location!</p>
</div>

<div class="container">
    <div class="row">
        <?php

        require_once "connection.php";


        $rows = GetData( "select * from images" );


        foreach ($rows as $row)
        {
            $city=$row["img_title"];
            $image=$row["img_filename"];
            $width=$row["img_width"];
            $height=$row["img_height"];
            $img_id=$row["img_id"];
            echo "<div class='col-sm-4'>";
            echo "<h3>$city</h3>";
            echo "<p>$width - $height pixels</p>";
            echo "<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>";
            echo "<img width='100%' src='./images/$image.jpg' alt='photokes'></img>";
            echo '<a href="stad.php?img_id=' . $row["img_id"] . '">Meer informatie</a>';
            echo "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>
