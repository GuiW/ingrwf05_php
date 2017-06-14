<?php
  //
  //avec require, s'il ne trouve pas le fichier, le script s'arrête
  require("config.php")
?>
<?php
  //On définit la requête sql dans une variable
  $sql = "SELECT * FROM personnes ORDER BY nom, prenom";

  //On exécute la requête mais on la perd. Il faut donc récupérer le résultat dans une variable ($q_personnes)
  $q_personnes = $connect->query($sql);

  //En cas d'erreur, on l'affiche
  echo $connect->error;

  //On récupère le nombre de lignes
  $nb_personnes = $q_personnes->num_rows;

  // print_r($q_personnes);

// ************************************************************************** //

  //Si on a en paramètre dans l'url "id_personnes", on lance la requête contenue dans $sql.
  if ( isset($_GET['id_personnes']) ) :
    //On veut afficher les lignes dont la propriété id_personnes = la valeur du paramètre id_personnes de l'url
    $sql = "SELECT * FROM personnes WHERE id_personnes =".$_GET['id_personnes'];
    //$the_personne contient la ligne de la table 
    $the_personne = $connect->query($sql);
    echo $connect->error;
    $the_nb_personne = $the_personne->num_rows;
  endif;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Listing</title>

  <style>
    body {
      font-family : arial;
      display : flex;
      width : 75%;
      margin : 0 auto;
    }
    main {
      width : 80%;
    }
  </style>

</head>
<body>
  <main>
    <?php if ( isset($the_nb_personne) AND $the_nb_personne > 0 ) :

      while ( $row = $the_personne -> fetch_object() ) : ?>
        <h1>Fiche :</h1>
        <h2><?php echo $row->prenom ?> <?php echo $row->nom ?></h2>
        <p><?php echo ($row->genre == "M") ? "Né" : "Née"; ?> le <?php echo ($row->ddn != '') ? $row->ddn : "Inconnu"; ?></p>
        <dl>
          <dt>Email</dt>
          <dd><?php echo ($row->email != '') ? $row->email : "Inconnu"; ?></dd>
          <dt>Tel</dt>
          <dd><?php echo ($row->telephone != '') ? $row->telephone : "Inconnu"; ?></dd>
        </dl>
    <?php endwhile;
    
    else :
      echo "personne";

    endif; ?>
  </main>

  <aside>
  <!-- On vérifie si il y a des lignes dans notre table -->
  <?php if($nb_personnes > 0) : ?>
  <ul>
    <!-- Boucle pour afficher les propriétés nom et prénoms de chaque ligne de la table -->
    <?php while( $row = $q_personnes->fetch_object() ) : ?>
      <li><a href="?id_personnes=<?php echo $row->id_personnes ?>"><?php echo $row->nom ?> <?php echo $row->prenom ?></a></li>
    <?php endwhile; ?>
  </ul>
  <?php else :
    echo "Il n'y a personne.";

  endif; ?>
  </aside>
</body>
</html>