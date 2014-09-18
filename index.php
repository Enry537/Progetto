<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento senza titolo</title>
<link href="files/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
session_start();
// includiamo il file di connessione al database

include ('files/configurazione.php');

?>
<div id="container">
    <div id="header">
         </div><!--#header-->
        <div id="navigation"><?php include ('files/menu_hor.html'); ?></div><!--#navigation-->
    <div id="sidebar">
<?php include ('files/menu_sid.html'); ?>
    </div>
    <div id="main">
        <?php 
		
		$risultati=mysql_query("SELECT * FROM annunci"); 

        $num=mysql_numrows($risultati);
		
		if ( $num != 0 ) {
		
		$i=0;
		while ($i < $num) { 
     	$titolo=mysql_result($risultati,$i,"titolo");
        $categoria=mysql_result($risultati,$i,"categoria");
        $provincia=mysql_result($risultati,$i,"provincia");
		$prezzo=mysql_result($risultati,$i,"prezzo");
        $descrizione=mysql_result($risultati,$i,"descrizione");
        $mail=mysql_result($risultati,$i,"mail");
 
        echo "<table width='640' border='0' bgcolor='#fbfbea'>
  <tr>
    <td colspan='2'><b>$titolo</b></td>
  </tr>
  <tr>
    <td width='315'>Comune: $provincia</td>
    <td width='315'>prezzo: &#8364; $prezzo</td>
  </tr>
  <tr>
    <td height='75' colspan='2'>$descrizione</td>
  </tr>
  <tr>
    <td>Contatto: <a href='mailto:$mail'>$mail</a></td>
    <td>&nbsp;</td>
  </tr>
</table><hr /></p>";

     	$i++;
 						  }
		}
		
		else {

echo "Non sono presenti annunci";

}
echo $_SESSION['username'];
		?>
    </div>
    <div id="footer"><?php include ('files/footer.html'); ?></div>
</div>
</body>
</html>
