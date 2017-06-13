<?php
  $nom = $_POST['name'];
  $prenom = $_POST['firstname'];
  $ddn = $_POST['ddn'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exercice 01</title>

  <style>
    body {
      font-family : arial;
    }
    form {
      background : lightgrey;
      max-width : 300px;
      padding : 10px;
    }

    label {
      display : block;
    }

    input {
      margin-bottom : 10px;
      border-radius : 4px;
      border : none;
      line-height : 20px;
      width : 100%;
    }

    button {
      width : 20%;
      border : none;
      background : grey;
      color : white;
    }
  </style>

</head>
<body>
  <?php if ( !isset($_POST['name'])) : ?>
    <h1>Qui êtes vous ?</h1>
    <form action="" method="post">
      <label for="nom">Nom : </label>
      <input type="text" name="name" id="nom"><br>

      <label for="prenom">Prénom : </label>
      <input type="text" name="firstname" id="prenom"><br>

      <label for="ddn">Date de naissance : </label>
      <input type="date" name="ddn" id="ddn"><br>

      <!-- On peut utiliser un champ masquer pour envoyer certaines données au serveur -->
      <input type="hidden" name="lg" value="fr">

      <button>Go</button>
    </form>

  <?php else : ?>
    <h1>Bienvenue <?php echo $prenom." ".$nom?></h1>
    <p>Vous êtes né le <strong><?php echo $ddn?></strong></p>

  <?php endif;?>
</body>
</html>
<?php
  //On peut placer nos outils de débogage ici
  //On place nos variables en sortie
  print_r($_POST);
?>