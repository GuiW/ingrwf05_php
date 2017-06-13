<?php
  //Controler
  //isset permet de contrôler si ça existe
  if (isset($_GET['qui'])) :
    $nom = $_GET['qui'];
  else :
    $nom = "";
  endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GET</title>
  <style>
    body {
      display : flex;
    }
    aside {
      width : 20%;
    }
  </style>
</head>
<body>
  <main>
    <h1>Bienvenue <?php /**/echo $nom;?></h1>
  </main>
  <aside>
    <ul>
      <li><a href="?qui=Guillaume">Guillaume Wilmotte</a></li>
      <li><a href="get.php?qui=Thomas">Thomas Wilmotte</a></li>
      <li><a href="?qui=Maxime">Maxime Wilmotte</a></li>
    </ul>
    <!-- La méthode du formulaire est par défaut en get. -->
    <form action="get.php" method="get">
      <label for="">Votre prénom ?</label>
      <input type="text" id="prenom" name="qui">
      <button>Go</button>
    </form>
  </aside>
</body>
</html>
<?php
  //On peut placer nos outils de débogage ici
  //On place nos variables en sortie
  print_r($_GET);
?>