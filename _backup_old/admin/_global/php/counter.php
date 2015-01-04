<?php

if (strchr($HTTP_USER_AGENT,"8751")) $countnot = 1;
if (strchr($HTTP_USER_AGENT,"agis")) $countnot = 1;

if ($countnot != 1)
	{
	require_once("/www/htdocs/v122164/admin/_global/php/dbconnectmc.php");

	$insert = @mysql_query("INSERT INTO Counter
	                        SET
       			        datum = '" . date('Y-m-d') . "',
       			        zeit = '" . date('H:i:s') . "',
       			        homepage = '" . $SERVER_NAME . "',
				seite = '" . $SCRIPT_NAME . "',
				remote_ip = '" . $REMOTE_ADDR . "',
        		        user_agent = '" . $HTTP_USER_AGENT . "'");

	};
?>