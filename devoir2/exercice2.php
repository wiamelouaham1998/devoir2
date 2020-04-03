<html>
<head>
	<title> Exo2 devoir2 PHP</title>
</head>
<body>

	<h2 align="center"> Commande clients </h2><br>
	<?php 
		$fichier= file("commandes.txt");
		$nbCommandes = count($fichier); 
	?>
<table align="center" border="1" width="90%" height="50%">
	<tr>
	<th align="center" bgcolor="#C0C0C0" width="50" height="30"> Numero de commande</th>
	<th align="center" bgcolor="#C0C0C0" width="50" height="30"> Numero du client</th>
	<th align="center" bgcolor="#C0C0C0" width="50" height="30"> Date de commande</th>
	<th align="center" bgcolor="#C0C0C0" width="50" height="30"> Designation de l'article</th>
	<th align="center" bgcolor="#C0C0C0" width="50" height="30"> Quantite</th>
	<th align="center" bgcolor="#C0C0C0" width="50" height="30"> Prix unitaire</th>
	<th align="center" bgcolor="#C0C0C0" width="50" height="30"> Date de livraison</th>
	<th align="center" bgcolor="#C0C0C0" width="50" height="30"> Adresse du client</th>
	</tr>
		<?php 
		$fd=fopen("commandes.txt","r");
		for($i=0;$i<$nbCommandes;$i++) {
		$ligne = fgets($fd,255);
		if (!empty($ligne))
		{
			
			if(strpos($ligne, "CLI1001")== true)
			{	
				$f1=fopen("client1.txt","a");
				fwrite($f1, $ligne, strlen($ligne));
				fclose($f1);
			}
			else if(strpos($ligne, "CLI1004")== true)
			{
				$f2=fopen("client2.txt","a");
				fwrite($f2, $ligne, strlen($ligne));
				fclose($f2);
			}
		$tabligne=explode("|",$ligne);
		}
	?>
	<tr>
		<td align="center" width="50" height="30" bgcolor="white"><?php echo $tabligne[0]?></td>
		<td align="center" width="50" height="30" bgcolor="white"><?php echo $tabligne[1]?></td>
		<td align="center" width="50" height="30" bgcolor="white"><?php echo $tabligne[2]?></td>
		<td align="center" width="50" height="30" bgcolor="white"><?php echo $tabligne[3]?></td>
		<td align="center" width="50" height="30" bgcolor="white"><?php echo $tabligne[4]?></td>
		<td align="center" width="50" height="30" bgcolor="white"><?php echo $tabligne[5]?></td>
		<td align="center" width="50" height="30" bgcolor="white"><?php echo $tabligne[6]?></td>
		<td align="center" width="50" height="30" bgcolor="white"><?php echo $tabligne[7]?></td>
	</tr>
	
	<?php } ?>
		
		
</table>	
</body>
</html>