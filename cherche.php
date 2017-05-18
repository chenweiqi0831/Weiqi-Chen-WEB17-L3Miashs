<html>
<head>
   <meta charset="utf-8"/>
     <title>Tu ne sais pas manger quoi?</title>
</head>
<body>
<h1> Les meilleurs restaurant dans 19 villes</h1>

    <p><img src="http://blog.privateaser.com/wp-content/uploads/2016/07/restaurant-insolites.jpg"/></p>
Quand vous avez voyagé dans une ville étrangère avec vos amis ou votre famille, vous voulez coûter les mets délicieux, comment vous pouvez faire?
N'inquiétez pas, il y a une liste de restaurants dans 19 villes pour vous aider.





<form method="GET" action="found.php">
<p>Vous voulez choisir quelle ville:</p>
<select name="ville">
<?php
$db = new SQLite3('resultat.db');

$results = $db->query(
    'SELECT DISTINCT "Ville", "Codepostal" FROM restaurant ORDER BY "Ville"'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[1],"'>", $row[0], "</option>\n";
    }
}
?>
</select>



<br/>
<p><input type="submit" name="Go" value="Cherche"/></p>

<br/>
</form>
</body>
</html>
