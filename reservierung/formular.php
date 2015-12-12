<?php

$formularAnzeigen = 1;

if (isset($_POST["name"]))
{
    // Reservierung durchführen
    $name = trim($_POST["name"]);
    $persoNr = strtoupper(trim($_POST["personalausweisnummer"]));

    // Daten auf Vollständigkeit prüfen
    if (!empty($name))
    {
        if (!empty($persoNr))
        {
            $formularAnzeigen = 0;   // Eine Bestätigung statt dem Formular anzeigen

            // Datenbankzugriff
            @include "dbconnect.php";

            // Ist der Eintrag bereits vorhanden?
            $result = @mysql_query("SELECT COUNT(`personalausweisnr`) AS `anzahl` FROM `reservierung` WHERE `personalausweisnr`='" . mysql_real_escape_string($persoNr) . "'");
            if (@mysql_num_rows($result) == 1)
            {
                $row = @mysql_fetch_assoc($result);
                if ($row["anzahl"] == 0)
                {
                    // In die Datenbank eintragen
                    $insert = @mysql_query("INSERT INTO `reservierung` (`name`, `eintrag`, `personalausweisnr`) VALUES ('" . mysql_real_escape_string($name) . "', CURRENT_TIMESTAMP, '" . mysql_real_escape_string($persoNr) . "')");

                    if ($insert)
                    {
                        // Eine Mail verschicken
                        mail("info@schlofozuchball.de", "Neue Reservierung" , $name . ", " . $persoNr . ", " . date('Y-m-d'), "From:Reservierung Schlofozuchball <info@schlofozuchball.de>");
                    }
                    else
                    {
                        // Fehler beim Eintragen
                        echo "<span style='color: red; font-weight: bold;'>Beim Eintragen Deiner Daten in unsere Datenbank ist ein Fehler passiert. Bitte versuche es später erneut!</span><br /><br />";
                        $formularAnzeigen = 1;
                    }
                }
                else
                {
                    // Bereits registriert
                    echo "<span style='color: blue; font-weight: bold;'>Für Deine Ausweisnummer ist bereits eine Karte reserviert. Wir zeigen dir die Bestätigung erneut an.</span><br /><br />";
                }
            }
            else
            {
                echo "<span style='color: red; font-weight: bold;'>Leider gibt es Probleme mit unserer Datenbankverbindung! Bitte versuche es später nochmal.</span><br /><br />";
                $formularAnzeigen = 1;
            }
        }
        else
        {
            echo "<span style='color: red; font-weight: bold;'>Bitte gib eine gültige Personalausweis-Nummer ein!</span><br /><br />";
        }
    }
    else
    {
        echo "<span style='color: red; font-weight: bold;'>Bitte gib Deinen Namen ein!</span><br /><br />";
    }
}

if ($formularAnzeigen == 1)
{
    // Formular anzeigen
?>
<h2>Reserviere jetzt kostenlos eine Karte</h2><br />
<form method="POST" action="<? echo $PHP_SELF; ?>">
<table border="0" cellpadding="5px">
<tr><td width="250px"><b>Name, Vorname:</b></td><td><input type="text" name="name" value="<? if(isset($_POST["name"])) { echo $_POST["name"]; } ?>" style="width: 400px; border: 1px solid grey;" /></td></tr>
<tr><td><b>Personalausweis-Nummer:</b> *</td><td><input type="text" name="personalausweisnummer" value="<? if(isset($_POST["personalausweisnummer"])) { echo $_POST["personalausweisnummer"]; } ?>" style="width: 400px; border: 1px solid grey;" /></td></tr>
<tr><td colspan="2"><input type="submit" value="Reservieren!" /></td></tr>
<tr><td colspan="2"><span style="color: grey;">*Personalausweis oder Reisepass. Sofern
    kein deutscher Ausweis vorliegt, geht natürlich auch ein
    vergleichbarer Ausweis des jeweiligen Heimatlandes.<br /><br />
    <strong>Wichtig: Nach dem Abschicken
    wird sofort eine Reservierungsbestätigung erzeugt, die
    ausgedruckt und zusammen mit dem Personalausweis an der Kasse
    vorgelegt werden muss! </strong><br /><br />
    <strong>Die Reservierung ist bis
    21.00 Uhr gültig. Einlass nur im Schlafanzug!</strong><br /><br />
    Die Daten werden
    ausschließlich für die Einlasskontrolle gespeichert und
    verwendet. Eine Weitergabe erfolgt nicht und die Löschung
    wird in der Woche nach der Veranstaltung durchgeführt. </span></td></tr>
</table>
</form>

<?php
}
else
{
    // Bestätigung anzeigen
?>

<h2>Du hast erfolgreich Karten für den Schlofozuchball 2016 reserviert!</h2><br />
Ein Fenster mit deiner Bestellbestätigung sollte sich automatisch öffnen. Falls nicht, klicke bitte <a href="http://www.schlofozuchball.de/reservierung/bestaetigung.php?personalausweisnummer=<?php echo $persoNr; ?>&name=<?php echo $name; ?>" class="link" target="blank">hier</a>.<br /><br />

<a href="index.php" class="link">Zurück zur Seite 'Alles auf einen Blick'</a>

<script type="text/javascript">
    window.open('http://www.schlofozuchball.de/reservierung/bestaetigung.php?personalausweisnummer=<?php echo $persoNr; ?>&name=<?php echo $name; ?>', '_blank');
</script>
<?php
}
?>
