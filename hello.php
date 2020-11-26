<h1>hello, world</h1>

<?php

$naam= "Peter Vrancken";
echo "<h2>Hello, $naam</h2>";

$x=0;
while ($x<500)
{
    print"<p>Hoihoihoi</p>";
    $x++;
}
$lijst_2= ["Denes"=>98,
    'Dieter'=>97,
    "eliot"=>96];

foreach($lijst_2 as $student_voornaam => $punten)
{print "<p>Hallo $student_voornaam, je had $punten";}
?>

<p>Lorem ipsum...</p>