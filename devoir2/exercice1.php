<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
  function couper_chaine($string,$car){ 
     $retour = array(); 
      $car = ' '; 
      $tok = strtok($string, " "); 
      while (strlen(join(" ", $retour)) != strlen($string)) { 
      array_push($retour, $tok); 
      $tok = strtok($car); 
      } 
      return $retour; 
    }
$Chaine="chaque tablespace a des segement chaque segment a des extenstions(extend) conteints des blocs(8K) au moins 5*8=40";
$car=' '; 
 $tableau = couper_chaine($Chaine,$car); 
 print_r ( $tableau);
    
?>
</body>
</html>
