<html>

<head>
<title>Fehlermeldung</title>
</head>

<body>

<h1>Fehler</h1>


<?php
echo("<p>mySQL-Fehler in " . strtoupper(substr(strrchr($SCRIPT_NAME,"/"),1,-4)) . "<br>mySQL Error: " . mysql_error() . "<br></p>");
	exit;
?>

</body>
</html>