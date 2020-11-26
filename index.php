<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
        $images = array("stad1", "stad2", "stad3");

        function imagesincolumns($imagescity){
            $column = 0;
            foreach($imagescity as $image){
                $column = $column + 1;
                echo "<div class='col-sm-4'>";
                echo "<h3>Column $column</h3>";
                echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>";
                echo "<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>";
                echo "<img width='100%' height='180px' src='images/$image.jpg' alt='photokes'></img>";
                echo "</div>";
            }
        }
        echo imagesincolumns($images);
        ?>
    </div>
</div>

</body>
</html>
