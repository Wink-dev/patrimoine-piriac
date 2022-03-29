<?php
$form_name = "dictee2012.html";
$site_name = "index.html";
$error_msg = "";
$maildaten = "";

//Stammen die Daten vom Formular?
if (isset($_POST["envoyer"])) {

// Textfeldeingaben filtern
function filtre_contenu($contenu) {
  if (!empty($contenu)) {
    // HTML- und PHP-Code entfernen.
    $contenu = strip_tags($contenu);
    // Umlaute und Sonderzeichen in HTML-Schreibweise umwandeln
    // $contenu = htmlentities($contenu);
    // Entfernt überflüssige Zeichen Anfang und Ende einer Zeichenkette
    $contenu = trim($contenu);
    // Backslashes entfernen
    $contenu = stripslashes($contenu);
  }
return $contenu;
}

// Schreibarbeit durch Umwandlung ersparen
foreach ($_POST as $key=>$element) {
  if ($key != "envoyer") {
    // Eingaben Filtern
    $donnees = filtre_contenu($element);
    // Dynamische Variablen erzeugen, wie mailer_name, etc.
    ${"mailer_".$key} = $donnees;
    $maildaten .= "$key: $donnees\n";
  }
}

//Mailadresse korrekt angegeben - Name entsprechend formatieren
if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$",$mailer_email)){
  $error_msg.="Votre Adresse Email contient des erreurs<br>";
}

if (strlen($mailer_nom)==0) {
  $error_msg.="Vous avez oubli&eacute; d&rsquo;indiquer votre nom<br>";
}
if (strlen($mailer_email)==0) {
  $error_msg.="Vous avez oubli&eacute; d&rsquo;indiquer votre adresse email<br>";
}
if (strlen($mailer_telephone)==0) {
  $error_msg.="Vous avez oubli&eacute; d&rsquo;indiquer votre numero de t&eacute;l&eacute;phone<br>";
}

// Prüfen, ob Fehler vorgekommen sind!
if($error_msg){
	echo "
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<html>
<head>
<title>Inscription</title>
<link rel='stylesheet' type='text/css' href='standard.css'>
<style type='text/css'>
<!--
-->
</style>
</head>
<body>
<center><H1>Erreur</h1>
 Il y a des erreurs! Mail.PHP<br>
        $error_msg
       	Merci d&rsquo;essayer &agrave; nouveau!<br>
         <a href='$form_name'>Retour au formulaire</a><br><br></center>

</body>
</html>

";

} else {
$mailer_datum=date("Y-m-d H:i:s");
	echo "
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<html>
<head>
<title>Inscription</title>
<link rel='stylesheet' type='text/css' href='standard.css'>
<style type='text/css'>
<!--
-->
</style>
</head>
<body>
<center><H1>Merci</h1>
Votre inscription a bien &eacute;t&eacute; envoy&eacute;! 
<br>Vous allez recevoir un email de confirmation.<br>
        <br><br>
    <a href='../home.html'>Retour &agrave; l'accueil</a>    
</center>
</body>
</html>

";

include("autoreponse.php");

}

} else {
echo "
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
<html>
<head>
<title>Inscription</title>
<link rel='stylesheet' type='text/css' href='standard.css'>
<style type='text/css'>
<!--
-->
</style>
</head>
<body>
<center><H1>Erreur</h1>
 Il y a des erreurs! Mail.PHP<br>
        Merci d&rsquo;essayer &agrave; nouveau!<br>
        <a href='$form_name'>Retour au formulaire</a><br><br></center>

</body>
</html>
";
}
?>
