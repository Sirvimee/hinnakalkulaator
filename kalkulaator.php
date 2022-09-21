<html>
<head>
<title>Pellet vs elekter, kalkulaator</title>
<style>
    body {
        font-family: sans-serif;
        margin: 30px;
    }
    </style>
</head>

<body>

<h1>Pellet vs elekter</h1>
<br>

<form action="" method="post">
  Sisesta pelleti kütteväärtus, kWh (vt. pakendilt): <input type="text" name="pellet"><br>
  Pelleti paki maht, kg: <input type="text" name="pellet_maht"><br>
  Sisesta pelleti kulu kuus, pk: <input type="text" name="pellet_kulu"><br>
  Sisesta pelleti hind, pk: <input type="text" name="pellet_hind"><br>
  Sisesta elektri hind, s/kWh: <input type="text" name="elekter_hind"><br><br> 
  <input type="submit" name="ok" value="Arvuta"><br>

<?php

if(isset($_POST['ok'])) {
	$a = $_POST['pellet'];
	$b = $_POST['pellet_kulu'];
	$c = $_POST['pellet_hind'];
	$d = $_POST['elekter_hind'];
    $e = $_POST['pellet_maht'];
    $kilohind = $c / $e;
    $pelletikulu = $b * $e;
    $elekter = $a * $pelletikulu;
	$pelletihind = $pelletikulu * $kilohind;
	$elektrihind = $elekter * $d;
    
    if($pelletihind < $elektrihind) {
        echo "<br>";
        echo "<strong><font color=red>Elektrihind kuus: </font><font color=red>$elektrihind</font><font color=red> eurot.</font></strong><br>";
        echo "<strong><font color=green>Pelletihind kuus: </font><font color=green>$pelletihind</font><font color=green> eurot.</font></strong>";
    } else if($pelletihind > $elektrihind) {
        echo "<br>";
        echo "<strong><font color=green>Elektrihind kuus: </font><font color=green>$elektrihind</font><font color=green> eurot.</font></strong><br>";
        echo "<strong><font color=red>Pelletihind kuus: </font><font color=red>$pelletihind</font><font color=red> eurot.</font></strong>";
    } else {
        echo "<br>";
        echo "Elektrihind kuus: " . $elektrihind . " eurot.";
        echo "<br>";
        echo "Pelletihind kuus: " . $pelletihind . " eurot.";
    }
    
	echo "<br><br>";
    echo "Elektrikulu kuus: " . $elekter . " kWh.";
    
}
?>


</form>
</body>
</html>