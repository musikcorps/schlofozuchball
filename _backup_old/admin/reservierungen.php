<?php
include("/home/www/f1122305/html/adminmania/database/dbconnect/hairnskin.php");

$select = @mysql_query("SELECT *
			FROM schlofozuchball_reservierung
			ORDER BY name");
				
if (!$select)
	{
	include("/home/www/f1122305/html/adminmania/database/sql/sql_error.php");
	};

while ($ergebnis = mysql_fetch_array($select))
	{
	echo $ergebnis["name"] . ";" . $ergebnis["personalausweisnr"] . "\n";
	};
?>