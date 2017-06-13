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