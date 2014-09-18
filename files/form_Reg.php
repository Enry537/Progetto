<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
</head>

<body>
<?php

// includiamo il file di connessione al database

include ('configurazione.php');

// creiamo il nostro modulo di registrazione
?>



<form action="?registration=success" method="POST">

  <p><b>Nome e Cognome</b><br>
  <input type="text" name="nome">
  <br />
  <br>
  <b>Mail</b><br>
  <input type="text" name="mail">
  <br />
  <br>
    
  <b>Nome Utente</b><br>
  <input type="text" name="username">
  <br />
  <br>
    
  <b>Password</b><br>
  <input type="password" name="pass">
  <br />
  <br>
    
  <b>Ripeti Password</b><br>
  <input type="password" name="pass2">
  </p>
  <p><br>
    
    <input type="image" src="files/img/button_reg.jpg" border="0"/><br>
  </p>

</form>

<?php

// attraverso un if controlliamo che il form sia stato inviato

if ( $_GET['registration'] == "success" ) {

// recuperiamo i dati inviati con il form

$nome = $_POST['nome'];

$username = $_POST['username'];

$mail = $_POST['mail'];

$pass1 = $_POST['pass'];

$pass2 = $_POST['pass2'];

// ora controlliamo che i campi siano stati tutti compilati

if ( $nome == TRUE && $mail == TRUE && $username == TRUE && $pass1 == TRUE && $pass2 == TRUE )  {


// controlliamo se il campo mail è stato scritto in maniera errata


$email = eregi("^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$",$mail);

if ( $email == TRUE ) {

// controlliamo se l'mail è presente già nel database

$sql = mysql_query("SELECT * FROM utenti WHERE mail = '$mail'") or die ("Mail già occupata");

$num_rows = mysql_num_rows($sql);

if ( $num_rows == 0 ) {

// ora controlliamo che le password inserite siano identiche

if ( $pass1 == $pass2 ) {

// infine criptiamo la password con md5

///$pass_md5 = md5($pass1);
$nome = mysql_real_escape_string($nome);
$username = mysql_real_escape_string($username);
$pass1 = mysql_real_escape_string($pass1);

mysql_query("INSERT INTO utenti
             (id , nome , mail , user , pass )
             VALUES
             ('','$nome', '$mail', '$username', '$pass1' )") OR DIE(mysql_error());

// e inviamo una mail con la riuscita registazione

mail ($mail, "Registrazione OK", "Complimenti registrazione effettuata con successo", "From: tuamail@host.formato");

// messaggi da far visualizzare all'utente finale

echo "Complimenti registrazione effettuata con successo.";

} else {

echo "Le password non corrispondono";

}

} else {

echo "Indirizzo mail già utilizzato.";

}

} else {

echo "La tua mail non è idonea, per la registrazione.";

}

} else {

echo "Tutti i campi sono obbligatori.";

}

}

?>
</body>
</html>