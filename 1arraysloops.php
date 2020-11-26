<h3>Arrays and loops</h3>



<?php
$student =	array(
    "voornaam" =>  "Jan",
    "naam" =>  "Janssens",
    "straat" =>  "Oude baan",
    "huisnr" =>  "22",
    "postcode" =>  2800,
    "gemeente" =>  "Mechelen",
    "geboortedatum" =>  "14/05/1991",
    "telefoon" =>  "015 24 24 26",
    "e-mail" =>  "jan.janssens@gmail.com"
);

function studenttotable($studentenlijst)
{
    echo "<h1>Student</h1>";
    echo "<table>";
    foreach($studentenlijst as $x => $val) {
        $x = ucfirst($x);
        echo "<tr><td>$x</td> = <td>$val</td></tr>";
    }
}

echo studenttotable($student)
?>
