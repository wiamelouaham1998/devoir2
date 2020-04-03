<html>
<head> </head>
<body>
<h1> Validation de la date</h1>

<?php 
if(isset($_POST['envoi'])){ 

echo " <strong> La date saisie est : ".$_POST['jour']."/".$_POST['mois']."/".$_POST['annee']."</strong><br>";
if(checkdate($_POST['mois'],$_POST['jour'],$_POST['annee']))
    echo 'La date saisie <span style="color:#008000;"> est valide </span><br>';
else if (date("L", mktime(0, 0, 0, 1, 1, $_POST['annee'])) != 1) 
	{echo 'l\'annee '.$_POST['annee'].' est non bissextile. <span style="color:#770000;"> Date invalide!</span><br>';}
	
else echo 'la date saisie <span style="color:#770000;"> est invalide!</span><br>';
}
?>
</body>
</html>