<?php
  ## Modèle
  //On simule l'encapsulation d'un login et d'un mdp dans des variables
  $log_ok = "admin";
  $pass_ok = "pass";
  //Création du fichier de session
  session_start();


  ## Controleur
  // Si on a delog dans l'url
  if( isset($_GET['delog']) ) :
    //1ere méthode : On tue la session
    //session_destroy();

    //2eme méthode : on supprime la variable en question
    unset($_SESSION['login']);

    header("location:log.php");
    exit;
  endif;

  if( isset($_POST['login']) ) :
    if( $_POST['login'] == $log_ok AND $_POST['pass'] == $pass_ok) :

      $_SESSION['login'] = $_POST['login'];
      //Redirection vers la même page
      header("location:log.php");
      //On arrête le script
      exit;
    else :
      echo "Pas ok";
    endif;
  endif;


  ## Vue
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Se logger</title>
</head>

<body>
  <?php if( !isset($_SESSION['login']) ) : ?>
  <form action="log.php" method="post">
    <input type="text" placeholder="login" name="login"><br>
    <input type="password" placeholder="Mot de passe" name="pass"><br>
    <button>S'identifier</button><br>
  </form>

  <?php else : ?>
  <a href="log.php?delog">Se déconnecter</a>
  <?php endif; ?>
</body>
</html>
<?php
  //On peut placer nos outils de débogage ici
  //On place nos variables en sortie
  print_r($_SESSION);
?>