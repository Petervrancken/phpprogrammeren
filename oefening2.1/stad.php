<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<style>

</style>
<body>

<div class="jumbotron text-center">
    <h1>Detail stad</h1>
</div>

<div class="container">
    <div class="row">
        <?php

        require_once "connection.php";


        $rows = GetData("select * from images where img_id =" . $_GET['img_id']);



        foreach($rows as $row){
            $city=$row["img_title"];
            $image=$row["img_filename"];
            $width=$row["img_width"];
            $height=$row["img_height"];
            echo "<div class='col-sm-12'>";
            echo "<h3>$city</h3>";
            echo "<p>filename: $image.jpg</p>";
            echo "<p>$width - $height pixels</p>";
            echo "<img class='img-fluid' style='width: 100%' src='./images/$image.jpg' alt='photokes'>";
            echo '<a href="steden2.php?img_id=' . $row["img_id"] . '">Naar hoofdpagina</a>';
            echo "</div>";}
        ?>
    </div>
</div>

</body>
</html>
