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
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $servername = "localhost";
        $username = "root";
        $password = "Mywampstack1988";
        $dbname = "steden";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from images";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                echo $row["img_id"] . "<br>";
                echo $row["img_filename"] . "<br>";
                echo $row["img_title"] . "<br>";
                echo "w:" . $row["img_width"] . "<br>";
                echo "h:" . $row["img_height"] . "<br>";
                echo "<br>";
            }
        }
        else
        {
            echo "No records found";
        }

        $conn->close();





        $images = array("stad1"=>"Amsterdam", "stad2"=>"New York", "stad3"=>"Barcelona");

        function imagesincolumns($imagescity){
            foreach($imagescity as $image => $city){
                echo "<div class='col-sm-4'>";
                echo "<h3>$city</h3>";
                echo "<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>";
                echo "<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>";
                echo "<img src='../images/$image.jpg' alt='photokes'></img>";
                echo "</div>";
            }
        }
        echo imagesincolumns($images);
        ?>
    </div>
</div>

</body>
</html>