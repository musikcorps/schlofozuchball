<?php

require_once("/www/htdocs/v122164/admin/_global/php/template.php");

if ($eintrag)
	{
	include("/www/htdocs/v122164/admin/_global/php/dbconnect.php");

	/////// DB abfragen ob Email bereits vorhanden
	$select = @mysql_query("SELECT COUNT( email ) AS anzahl FROM newsletter WHERE email = '$email' ");
	if (!$select) include("/www/htdocs/v122164/admin/_global/php/sql_error.php");

	while ($selectanzahl = mysql_fetch_array($select))
		{
		$anzahl = $selectanzahl["anzahl"];
		};

	if($anzahl == 0)
		{
		/////// In DB eintragen
			$insert = @mysql_query("INSERT INTO newsletter
              	        	                        SET
	               	        	                aboname = '$aboname',
        	      	        	                eintrag = '" . date('Y-m-d') . "',
                	      	        	        email = '$email'");
				
			if (!$insert) include("/www/htdocs/v122164/admin/_global/php/sql_error.php");

		/////// Email versenden
			$mailtext = "Willkommen beim Schlofozuchball Newsletter.<br><br>";
			$mailtext .= "Du hast dich mit der Adresse " . $email . " eingetragen und erhälst ab sofort alle Neuigkeiten rund um den Schlofozuchball.<br><br>";
			$mailtext .= "Falls du dich gar nicht selbst eingetragen hast, dann hat es wohl jemand anderes für dich getan. Wenn du den Newsletter gar nicht willst, kannst du dich aber ganz leicht wieder <a href=hhhttp://www.schlofozuchball.de/infos/newsletter.php>austragen</a>.";
			require_once("/www/htdocs/v122164/admin/_global/php/mail_template.php");
			mail($email, $mailtitel , $nachricht , $header);
			echo "<script language='JavaScript'>\n<!--\n alert('Die Adresse wurde in die Liste eingetragen.');\n -->\n </script>\n";
		}
	else
		{
		/////// Aus DB löschen
			$delete = @mysql_query("DELETE FROM newsletter WHERE email='$email'");
				
			if (!$delete) include("/www/htdocs/v122164/admin/_global/php/sql_error.php");

		/////// Email versenden
			$mailtext = "Schade, dass du dich beim Schlofozuchball Newsletter ausgetragen hast.";
			require_once("/www/htdocs/v122164/admin/_global/php/mail_template.php");
			mail($email, $mailtitel , $nachricht , $header);
			echo "<script language='JavaScript'>\n<!--\n alert('Die Adresse wurde aus der Liste gelöscht.');\n -->\n </script>\n";
			}
	}
?>

<script language="JavaScript">
<!--

function check(formular)
{
	if(formular.aboname.value == "")
	{
		alert("Gib bitte deinen Namen an!");
		formular.aboname.focus();
		return (false);
	}
	if(formular.email.value == "")
	{
		alert("Gib bitte deine Email-Adresse an!");
		formular.email.focus();
		return (false);
	}
	return (true);
}

//-->
</script>

<body style="border-top: 30 #6699FF solid">

<h3>Ab sofort über den Schlofozuchball immer auf dem Laufenden sein.</h3>

<h3>Hier kannst du dich für den Newsletter an- und abmelden.</h3>

<form method="POST" action='<?php echo $PHP_SELF;?>' name="erfassen" onSubmit='return check(document.erfassen)'>
    <p><input type="text" size="40" name="aboname"><br><address>Dein Name</address></p>
    <p><input type="text" size="40" name="email"><br><address>Deine Email-Adresse</address></p>
    <p><input type="submit" name="eintrag" value="An-/Abmelden"></p>
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
