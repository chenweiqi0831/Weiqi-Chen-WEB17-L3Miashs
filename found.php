<html>
<head>
   <meta charset="utf-8"/>
     <title>Voilà ce qu&apos;on trouve</title>
</head>
<body>
<h1> Voilà ce qu&apos;on trouve</h1>

<table>
<tr><th>Codepostal</th><th>Nom de resrautant</th><th>Adresse</th><th>Téléphone</th><th>Horaire d’ouverture</th>
</tr>
<?php
if (array_key_exists('ville', $_GET)) {
    $codepostal=$_GET['ville'];
} else {
    $codepostal=NULL;
}

if (array_key_exists('descr', $_GET)) {
    $description=$_GET['descr'];
} else{
    $description=NULL;
}

if (array_key_exists('offset', $_GET)) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}

$query = 'SELECT "Codepostal", "Nom", "Adresse", "Téléphone", "Horaire d’ouverture"'.
    'FROM restaurant WHERE 1 ';
    
if ($codepostal) {
    $query = $query . 'AND "Codepostal" = \'' . $codepostal . '\' ' ;
}

if ($description) {
    $query = $query . 'AND ( "Téléphone" LIKE \'%' . $description . '%\' ' .
        'OR "Adresse" LIKE \'%' . $description . '%\') ';
}

$query = $query . "LIMIT 10 " . "OFFSET " . $offset ;

#echo $query;

$db = new SQLite3('resultat.db');
$results = $db->query($query);

while ($row = $results->fetchArray()) {
    $full_ville = $row[0];
    $ville = substr($full_ville,0,10);
    echo "<tr>";
    echo "<td>",$ville,"</td>";
    echo "<td>",$row[1],"</td>";
    echo "<td>",$row[2],"</td>";
    echo "<td>",$row[3],"</td>";
	echo "<td>",$row[4],"</td>";
    echo "</tr>\n";
}

?>
</table>

<p><h2>Profitez-vous!</h2></p>
<p><img src="http://www.restoconnection.fr/wp-content/uploads/2014/08/restaurant-marketing-enfants-featured.jpg"/></p>
</body>
</html>


