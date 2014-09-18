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

// creiamo il nostro modulo di inserimento
?>

<form action="?insert=success" method="POST">

  <p><b>Titolo</b><br>
  <input type="text" name="titolo">
  <br />
  <br>
    
  <b>Categoria</b><br>
  <select name="categoria">
    <option value="Seleziona una voce">Seleziona una voce</option>
    <option value="Auto">Auto</option>
    <option value="Moto">Moto</option>
    <option value="Case">Case</option>
    <option value="Altro">Altro</option>
  </select>
  <br />
  <br>
    
  <b>Provincia</b><br>
  <select name="provincia">
    <option value="Seleziona una voce">Seleziona una voce</option>
    <option value="Cagliari">Cagliari</option>
    <option value="Gallura">Gallura</option>
    <option value="Medio Campidano">Medio Campidano</option>
    <option value="Nuoro">Nuoro</option>
    <option value="Oristano">Oristano</option>
    <option value="Ogliastra">Ogliastra</option>
    <option value="Sassari">Sassari</option>
    <option value="Sulcis">Sulcis</option>                
  </select>
  <br />
  <br>
    
  <b>Prezzo</b><br>
  <input type="text" name="prezzo" size="10">
  <br />
  <br>
    
  <b>Descrizione</b><br>
  <textarea name="descrizione" cols="28" rows="5"></textarea>
  <br />
  <br>
    
  <b>Mail</b><br>
  <input type="text" name="mail">
  </p>
  <p><br>
    
    <input type="image" src="files/img/button_ins.jpg" border="0"/><br>
  </p>

</form>

<?php

// attraverso un if controlliamo che il form sia stato inviato

if ( $_GET['inviodati'] == "ok" ) {

// recuperiamo i dati inviati con il form

$titolo = $_POST['titolo'];

$categoria = $_POST['categoria'];

$provincia = $_POST['provincia'];

$prezzo = $_POST['prezzo'];

$descrizione = $_POST['descrizione'];

$mail = $_POST['mail'];

// ora controlliamo che i campi siano stati tutti compilati

if ( $titolo == TRUE && $categoria == TRUE && $provincia == TRUE && $prezzo == TRUE && $descrizione == TRUE && $mail == TRUE )  {

// controlliamo se il campo mail è stato scritto in maniera errata

$email = eregi("^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$",$mail);

if ( $email == TRUE ) {

// controlliamo se il titolo è presente già nel database

$sql = mysql_query("SELECT * FROM annunci WHERE titolo = '$titolo'") or die ("Titolo già esistente");

$num_rows = mysql_num_rows($sql);

if ( $num_rows == 0 ) {

// infine criptiamo la password con md5

$pass_md5 = md5($pass1);

$nickname = mysql_real_escape_string($nickname);

$nome = mysql_real_escape_string($nome);

mysql_query("INSERT INTO annunci
             (id, titolo , categoria , provincia , prezzo , descrizione , mail )
             VALUES
             ('', '$titolo', '$categoria', '$provincia', '$prezzo', '$descrizione', '$mail' )") OR DIE(mysql_error());

// e inviamo una mail con la riuscita registazione


mail ($mail, "Annuncio inserito", "Complimenti annuncio inserito con successo", "From: tuamail@host.formato");

// messaggi da far visualizzare per conferma inserimento

echo "Complimenti annuncio inserito con successo.";
 
}
else {

echo "Titolo già utilizzato.";

}

} else {

echo "La tua mail non è idonea, per l'inserimento dell'annuncio.";

}

} else {

echo "Tutti i campi sono obbligatori.";

}

}

?>
</body>
</html>