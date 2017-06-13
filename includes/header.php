<?php
  //Controler
  //isset permet de contrôler si 'qui' est disponible dans l'url
  if (isset($_GET['qui'])) :
    $nom = $_GET['qui'];
  //Si 'qui' n'est pas dans l'url, on regarde si 'qui' est dans post
  elseif (isset($_POST['qui'])) :
    $nom = $_POST['qui'];
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
      align-content : stretch;
    }
    aside {
      width : 20%;
    }
  </style>
</head>
<body>