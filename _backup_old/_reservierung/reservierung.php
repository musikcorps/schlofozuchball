<?php
if ($senden)
	{
	/////// Variable werden zugewiesen
		$name = trim($name);
		$personalausweisnr = strtoupper(trim($personalausweisnr));

	/////// Überprüfung Felder leer?
		if (!empty($name))
			{
			
			if (!empty($personalausweisnr))
				{
				include("/www/htdocs/v122164/admin/_global/php/dbconnect.php");
				/////// DB abfragen ob Personr. bereits vorhanden
				$select = @mysql_query("SELECT COUNT( personalausweisnr ) AS anzahl
							FROM reservierung
							WHERE personalausweisnr = '$personalausweisnr' ");
				
				if (!$select)
					{
					include("/www/htdocs/v122164/admin/_global/php/sql_error.php");
					};

				while ($selectanzahl = mysql_fetch_array($select))
					{
					$anzahl = $selectanzahl["anzahl"];
					};

				if($anzahl == 0)
					{
					/////// In DB eintragen
						$insert = @mysql_query("INSERT INTO reservierung
                        	        	                        SET
                                	        	                name = '$name',
                                	        	                eintrag = '" . date('Y-m-d') . "',
                                        	        	        personalausweisnr = '$personalausweisnr'");
				
						if (!$insert)
							{
						include("/www/htdocs/v122164/admin/_global/php/sql_error.php");
							};

					/////// Email versenden
						mail("info@schlofozuchball.de", "Neue Reservierung" , $name . ", " . $personalausweisnr , "From:Reservierung Schlofozuchball<info@schlofozuchball.de>");

					$Bestaetigung = "1";
					}
				else
					{
					$Bestaetigung = "1";
					echo "<script language='JavaScript'>\n" .
			     			"<!--\n" .
			    			"alert('Die angegebene Personalausweisnummer ist breits registriert. Eine erneute Registrierung ist nicht möglich. Die Reservierungsbestätigung wird nun angezeigt und kann bei Bedarf nochmal ausgedruckt werden.');\n" .
				     		"-->\n" .
			     			"</script>\n";
					}

				}
			else
				{
				echo "<script language='JavaScript'>\n" .
			     		"<!--\n" .
			    		"alert('Bitte Personalausweisnummer angeben!');\n" .
				     	"-->\n" .
			     		"</script>\n";
				}

			}
		else
			{
			echo "<script language='JavaScript'>\n" .
			     "<!--\n" .
			     "alert('Bitte Namen angeben!');\n" .
			     "-->\n" .
			     "</script>\n";
			}
	}
?>
<html>
<head>
<title> Schlofozuchball Infos </title>
<link rel='stylesheet' type='text/css' href='http://www.schlofozuchball.de/_global/css/stylesheet.css'>
<script type="text/javascript">
function popUp1()
{
///window.open('http://www.schlofozuchball.de/reservierung/bestaetigung.php?personalausweisnr=<?php echo $personalausweisnr;?>&name=<?php echo $name;?>', 'NewWindows', 'fullscreen=no, scrollbars=yes, menubar=yes, toolbar=yes, status=yes');
window.open('http://www.schlofozuchball.de/reservierung/bestaetigung.php?personalausweisnr=<?php echo $personalausweisnr;?>&name=<?php echo $name;?>', '_parent');
}
</script>
</head>
<body style='border-top: 30 #6699FF solid' <?php if($Bestaetigung) {echo "onload='popUp1()'";}  ?>>
<h3>Reservierung für den Schlofozuchball am 19.02.2011</h3>

<form method='POST' action='<?php echo $PHP_SELF;?>'>
<table border="0" id="off">
<tr>
<td width="200"><strong>Name, Vorname</strong></td>
<td width="200"><input type='text' size='20' name='name' value='<?php echo $name;?>' maxlength='50'></td>
</tr>
<tr>
<td width="200"><strong>Ausweisnummer*<br>(max. 10 Stellen)</strong></td>
<td width="200"><input type='text' size='20' name='personalausweisnr' value='<?php echo $personalausweisnr;?>' maxlength='10'></td>
</tr>
</table>
<p><font size="2">*Personalausweis oder Reisepass. Sofern
    kein deutscher Ausweis vorliegt, geht natürlich auch ein
    vergleichbarer Ausweis des jeweiligen Heimatlandes.</font></p>
    <p><font color="#FF0000"><strong>Wichtig: Nach dem Abschicken
    wird sofort eine Reservierungsbestätigung erzeugt, die
    ausgedruckt und zusammen mit dem Personalausweis an der Kasse
    vorgelegt werden muss! </strong></font></p>
    <p><font color="#FF0000"><strong>Die Reservierung ist bis
    21.00 Uhr gültig. Einlass nur im Schlafanzug!</strong></font></p>
    <p><font color="#FF0000"><strong>Die Daten werden
    ausschließlich für die Einlasskontrolle gespeichert und
    verwendet. Eine Weitergabe erfolgt nicht und die Löschung
    wird in der Woche nach der Veranstaltung durchgeführt. </strong></font></p>

<p>
<input type='submit' name='senden' value='Abschicken'>
</p>
</form>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-2897477-2");
pageTracker._initData();
pageTracker._trackPageview();
</script>
</body>
</html>
<?php unset($Bestaetigung); ?>