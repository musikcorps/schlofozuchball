<?php
// Online-Kartenreservierungs-System
//
// Dokumentation:
//
//--------------------------------------------------------------------
?>

<?php
// Header und Menü
include "template/headerMenu.php";
?>

<h1>Karten-Reservierung</h1>
<br />

Ab jetzt kannst Du hier <b>online Karten</b> für den Schlofozuchball 2015 <b>reservieren</b>!<br /><br />
Du hast dadurch folgende <b>Vorteile</b>:
<ul>
    <li>Einlass bis 21 Uhr garantiert</li>
    <li>kein langes Anstehen vor 19.00 Uhr</li>
    <li>kein Drängeln</li>
    <li>keine Panik</li>
</ul>

<h2>Der genaue Ablauf</h2>
<ul>
    <li>Bei der Reservierung gibst du <b>Name, Vorname</b> und die <b>Nummer Deines Personalausweises</b> an</li>
    <li>Du erhälst sofort eine <b>Reservierung</b> angezeigt, die Du <b>ausdrucken</b> musst!</li>
    <li>Am 31. Januar musst Du die Reservierung und Deinen Ausweis <b>zum Eingang mitbringen</b>, <span style="color: red">ABER: spätestens um 21.00 Uhr da sein!</span></li>
    <li>Die Reservierung ist <b>nicht übertragbar</b> und immer nur für <b>eine Person</b> möglich.</li>
    <li>Bitte beachte, dass du lediglich eine Karte <b>reservierst</b>, und <b>nicht kaufst</b>! Du musst am Eingang zum Schlofozuchball den normalen <b>Eintrittspreis zahlen</b>.</li>
</ul>

<hr />

<?php include "reservierung/formular.php"; ?>
<!--Momentan ist die Reservierung noch nicht geöffnet, bitte komme später wieder.-->

<?php
// Footer
include "template/footer.php";
?>
