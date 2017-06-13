<?php
  $nom = "Wilmotte";
  $prenom = "Guillaume";
  $ddn = "1969-04-25";
  $inscription = true;
  $nb_enfants = 3;
  //Commentaire sur une ligne
  /* Commentaire
  sur plusieurs lignes */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Premier script php</title>
</head>
<body>
  <h1>Version 1 : Hello <?php echo $prenom;?> <?php echo $nom;?></h1>
  <h1>Version 2 : Hello <?php echo $prenom." ".$nom;?></h1>
  <h1>Version 3 : <?php echo "Hello $prenom $nom";?></h1>

  <?php 
    if ($nb_enfants > 1) : 
      $txt_enfant = "enfants";
    else :
      $txt_enfant = "enfant";
    endif;
  ?>
  <p><?php echo $prenom;?> a <?php echo $nb_enfants;?> <?php echo $txt_enfant;?></p>
</body>
</html>