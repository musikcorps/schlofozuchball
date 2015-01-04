<?php

####Variable
$db_Host = "localhost";
$db_User = "musicum";
$db_Passwort = "mc1957";
$db_Name = "musicum";

####Verbindung zur Datenbank
$dbconnect = @mysql_connect($db_Host, $db_User, $db_Passwort);
	
##Prüfung ob Datenbankverbindung funktioniert.
if (!$dbconnect)
	{
	include("/www/htdocs/v122164/admin/_global/php/sql_error.php");
	}

####Datenbank auswählen und Prüfung ob Auswahl funktioniert
$dbselect = @mysql_select_db($db_Name);

##Prüfung ob Datenbankauswahl funktioniert.
if (!$dbselect)
	{
	include("/www/htdocs/v122164/admin/_global/php/sql_error.php");
	}
?>