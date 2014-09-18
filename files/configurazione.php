<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
</head>

<body>
<?php
// connettiamoci il nostro database

$db_host = "http://spano.sc.unica.it/phpmyadmin";
$db_user = "deianaEnrico";
$db_password = "scarabeo52";
$db_name = "amm14_deianaEnrico";

//connetto il database
$db = mysql_connect($db_host, $db_user, $db_password) or die ('Errore durante la connessione');
mysql_select_db($db_name, $db) or die ('Errore durante la selezione del db');

?>
</body>
</html>