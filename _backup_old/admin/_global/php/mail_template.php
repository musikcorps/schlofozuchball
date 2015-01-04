<?php

/////// Mail vorbereiten

	$mailtitel = "Schlofozuchball Newsletter";

	$header = "From:Schlofozuchball Newsletter<info@schlofozuchball.de>\n";
	$header.= "Reply-To: <info@schlofozuchball.de>\n";
	$header.= "MIME-Version: 1.0\n";
	$header.= "Content-Type: multipart/related; type=\"multipart/alternative\"; boundary=\"----=AbschnittHauptnachricht\"\n";
	$header.= "This is a multi-part message in MIME format.\n";
	$header.= "------=AbschnittHauptnachricht\n";
	$header.= "Content-Type: multipart/alternative; boundary=\"----=AbschnittNachrichtenteile\"\n";

	$nachricht = "------=AbschnittNachrichtenteile\n";
	$nachricht .= "Content-type: text/plain; charset=\"iso-8859-1\"\n";
	$nachricht .= "Content-Transfer-Encoding: quoted-printable\n";
	$nachricht .= "\n";
	$nachricht .= $mailtext. "\n";
	$nachricht .= "\n";
	$nachricht .= "------=AbschnittNachrichtenteile\n";
	$nachricht .= "Content-Type: text/html;\n charset=\"iso-8859-1\"\n";
	$nachricht .= "Content-Transfer-Encoding: quoted-printable\n";
	$nachricht .= "\n";
	$nachricht .= "<HTML>\n<HEAD>\n<TITLE>Schlofozuchball Newsletter</TITLE>\n";
	$nachricht .= "<STYLE type=3Dtext/css>\n<!--\n";
	$nachricht .= "p { color:#31C631; font-family: Verdana, Arial, Helvetica; font-weight:bold; font-size:13pt }\n";
	$nachricht .= "h1 { color:blue; font-family: Arial; font-weight:bold; font-size:36pt }\n";
	$nachricht .= "address { color:#000000;  font-family: Verdana, Arial, Helvetica; font-style:normal; font-size:8pt }\n";
	$nachricht .= "//-->\n</STYLE>\n</HEAD>\n";
	$nachricht .= "<BODY bgColor=3D#eeeeee>\n<DIV>&nbsp;</DIV>\n";
	$nachricht .= "<center><IMG src=3D\"cid:logo_mail.gif\"></center><hr>\n";
	$nachricht .= "<P>" . $mailtext . "</P>\n";
	$nachricht .= "<hr>\n";
	$nachricht .= "<ADDRESS>© Musikcorps FFW Niedernberg e.V. (Veranstalter)</ADDRESS>\n";
	$nachricht .= "</BODY>\n</HTML>";
	$nachricht .= "\n";
	$nachricht .= "------=AbschnittNachrichtenteile--\n";
	$nachricht .= "\n";
	$nachricht .= "------=AbschnittHauptnachricht\n";
	$nachricht .= "Content-Type: image/gif; \n name=\"logo_mail.gif\"\n"; 
	$nachricht .= "Content-Transfer-Encoding: base64\n";
	$nachricht .= "Content-Disposition: inline\n";
	$nachricht .= "Content-ID: <logo_mail.gif>\n";
	$nachricht .= "\n";

	$dateiname = "/www/htdocs/v122164/_global/images/logo_mail.gif";

	$nachricht .= chunk_split(base64_encode(fread(fopen($dateiname, "r"), filesize($dateiname))));
	$nachricht .= "\n";
	$nachricht .= "------=AbschnittHauptnachricht--\n";

?>