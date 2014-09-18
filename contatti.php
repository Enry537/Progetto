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
?>
<div id="container">
    <div id="header">
         </div><!--#header-->
        <div id="navigation"><?php include ('files/menu_hor.html'); ?></div><!--#navigation-->
    <div id="sidebar">
<?php include ('files/menu_sid.html'); ?>
    </div>
    <div id="main">
        <p>Per maggiori informazioni su questa applicazione inviate una mail all'indirizzo enry537@gmail.com. <br />
          <br />
<a href="mailto:enry537@gmail.com"><img src="files/img/button_inv.jpg" border="0"></a>        </p>
    </div>
    <div id="footer"><?php include ('files/footer.html'); ?></div>
</div>
</body>
</html>
