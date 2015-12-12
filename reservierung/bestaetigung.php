<?php

if (isset($_GET["name"]) && trim($_GET["name"]) != "" && isset($_GET["personalausweisnummer"]) && trim($_GET["personalausweisnummer"]) != "")
{
    $name = trim($_GET["name"]);
    $persoNr = strtoupper(trim($_GET["personalausweisnummer"]));
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/default.css">
</head>
<body id="off">
<p align="center"><img src="logo.gif" width="500">

<h2 align="center">Reservierungbestätigung</h2>
<h3 align="center">für den Schlofozuchball am 31.01.2016 für</h3>
<h2 align="center"><?php echo $name; ?></h2>

<p align="center">
<?php
include("barcode_renderer/barcodeausgabe.php");
?>
</td></tr></table></p>

<p align="center">&nbsp;</p>

<p>&nbsp;</p>

<p>Wichtige Hinweise:</p>

<ul>
    <li>Diese Bestätigung ausdrucken und mitbringen!</li>
    <li>Einlass ab 19.00 Uhr und nur im Schlafanzug!</li>
    <li>Reservierung ist bis 21.00 Uhr gültig.</li>
    <li>Personalausweis bereithalten.</li>
    <li>Auch wenn sich eine Schlange bilden sollte, nicht die Nerven verlieren oder drängeln!</li>
</ul>


<p>&nbsp;</p>

<script language="JavaScript" type="text/javascript">
    window.print();
</script>

</body>
</html>

<?php
}
else
{
echo "Fehlerhafte Angaben";
}
?>
