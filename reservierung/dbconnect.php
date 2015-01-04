<?php
// Die Datenbankverbindung herstellen

// Variablen
$db_Host = "localhost";
$db_User = "...";
$db_Passwort = "...";
$db_Name = "...";

// Verbindung zur Datenbank
$dbconnect = @mysql_connect($db_Host, $db_User, $db_Passwort);

// Datenbank auswählen
$dbselect = @mysql_select_db($db_Name);

?>
