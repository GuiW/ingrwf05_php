# PHP
Vient de c++ -> similitudes

Script executé côté serveur

Pour analyser le script php, il faut un interpreteur. Travailler en local ne suffit plus.

Mamp nous offre un serveur apache et le module php greffer à apache.

Php est dit **contextuel** et javascript **evenementiel**

On va donc créer un contexte qu'on va donner au serveur et que le script utilisera -> principe d'un site dynamique

---

**Exemple :**

Pour 1000 produits dans 3 catégories 

 - Statique : 1003 fichiers html
 - Dynamique : 2 gabarits / templates => PHP 

 ---

Le cache côté serveur permet d'être plus rapide. Attention à le désactiver pendant le développement !

## Création d'un fichier php

Un fichier **.php** va être parcouru par le module php du serveur apache.

    <?php ... ?>

On peut mettre du php n'importe où dans le ficher (avant, après, dans le html)

Quand on va faire uns ite dynamique, on va le **décomposer en 3 parties** :
- **Model** : Il s'agit de la source de données (-> datas)
- **Controler** : Le noeud de l'application. C'est lui qui va interpréter dans quel contexte on se trouve. En fonction du contexte, on va chercher tel ou tel données (**MODEL**) et les afficher dans tel ou tel vue (**VIEW**)
- **View** : Affichage des données.

Modèle **MVC** : On va avoir des fichier pour le model, des fichiers pour le controler et des fichiers pour la view.

Si on travail dans un seul fichier, par convention, on va placer le controler et le model au dessus du DOCTYPE et la vue viendra après (Le controler peut aussi être placé après le DOCTYPE).

    <?php
      $nom = "Wilmotte";
      $prenom = "Guillaume";
    ?>

    <h1>Hello <?php echo $prenom." ".$nom;?></h1>

On peut également, au lieu d'utiliser la concaténation avec les **.** , englober les variables entre **double quotes**

    <h1> <?php echo "Hello $prenom $nom";?></h1>

**Condition :**

    <?php 
      if ($nb_enfants > 1) : 
        $txt_enfant = "enfants";
      else :
        $txt_enfant = "enfant";
      endif;

      //Le endif est important pour terminer la condition
    ?>
