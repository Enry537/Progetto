<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
</head>

<body>
<?php
session_start();
// includiamo il file di connessione al database

include ('configurazione.php');

if($_POST) {
	effettua_login();
} else {
	mostra_form();
}

function mostra_form()
{
	// mostro un eventuale messaggio
	if(isset($_GET['msg'])) {
		echo '<b>'.htmlentities($_GET['msg']).'</b><br /><br />';
	}
	?>
<form method="post" action="">

  <p><b>Nome Utente</b><br>
  <input type="text" name="username">
  <br />
  <br>
    
  <b>Password</b><br>
  <input type="password" name="password">
  <br />
  <br>
  
    <input type="image" src="files/img/button_log.jpg" border="0"/><br>
  </p>

</form>
	<?
}

function effettua_login()
{
	// recupero il nome e la password inseriti dall'utente
	$username      = trim($_POST['username']);
	$password  = trim($_POST['password']);
	// verifico se devo eliminare gli slash inseriti automaticamente da PHP
	if(get_magic_quotes_gpc()) {
		$username      = stripslashes($username);
		$password  = stripslashes($password);
	}

	// verifico la presenza dei campi obbligatori
	if(!$username || !$password) {
		echo "Username o Passowrd mancanti.";
		header("location: $_SERVER[PHP_SELF]?msg=$messaggio");
		exit;
	}
	// effettuo l'escape dei caratteri speciali per inserirli all'interno della query
	$username     = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);	

	// preparo ed invio la query
	$risultati = mysql_query("SELECT * FROM utenti WHERE user = '$username' AND pass = '$password'");
	// controllo l'esito
	if (!$risultati) {
		die("Errore nella query $query: " . mysql_error());
	}

	$vettore = mysql_fetch_array($risultati);

	if(!$vettore) {
		echo "Username o Passowrd sbagliati.";
	} else {
		session_start();
		$_SESSION['id'] = $vettore['id'];
		$_SESSION['username'] = $vettore['user'];
		$name=$_SESSION['username'];
		echo "Complimenti $name login effettuato con successo.";
	}
}
?>
</body>
</html>