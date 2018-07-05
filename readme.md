# CERTIFICATION

## Projet
Le projet est un magasin d'albums.
La possibilité de s'enregistrer est désactivée par une redirection et le seul utilisateur est considéré comme l'administrateur du site. Il a donc accès à toutes les routes. Le visiteur et potientiel acheteur n'a accès qu'aux routes permettant de voir les albums, leurs informations plus précises et à l'achat. Certains boutons présents dans la liste des albums lui sont cachés.


## Déroulé
J'ai commencé par définir sur une feuille les informations dont j'aurai besoin pour faire une application qui tienne la route au niveau logique si je me mets dans la situation d'un site de vente d'albums de musique.

L'installation de Laravel dans la Vagrant n'a pas posé de soucis particulier.

J'ai voulu tenter d'utiliser le 'Auth' de Laravel. Cela m'a posé beaucoup de soucis car j'ai utilisé une ancienne syntaxe visiblement concernant le **Route::group();** et je n'avais pas controllé cette syntaxe avant d'avancer dans les modifications que je souhaitais faire au système d'authentification. Après avoir restauré le dernier commit, j'ai relancé la commande **php artisan make:auth** pour repartir de zéro avant de voir mon erreur. J'y ai perdu une bonne heure.

L'installation de ce qui m'a permit de faire fonctionner le LESS ne m'a posé aucun problème.

J'ai ajouté un NavController qui m'assure que mes routes sont bien gérées.

Une fois le système d'authentification fonctionnel, j'ai créé les tables nécessaires au projet : *albums*, *authors*, *genres* et la table intermédiaire *album_genre*. La table *authors* est reliée à *albums* par une colonne *auhtor_id*. Cela me permettait de gérer des relations *OneToMany* et *ManyToMany*. J'ai laissé en commentaire la gestion des couvertures d'album dans un premier temps car je ne voulais pas perdre de temps.

J'ai ensuite créé mes seeds pour ces tables.

Lorsque j'ai voulu migrer mes tables, je suis tombée sur une erreur m'indiquant que je n'avais pas modifé les informations nécessaires à la connexion de Laravel à la base de données dans le fichier *.env*. J'ai corrigé ce problème.

J'ai ajouté, toujours avec les commandes de Laravel, les modèles qui me serviront à gérer les données de mes tables et leurs relations. Je me suis rendue compte que j'avais oublié la colonne *price* dans ma table *albums*, j'ai donc *fresh* les migrations et ajouté cette donnée dans ma seed correspondante.

Le CRUD n'a pas posé de soucis particulier, du moins sans la gestion des couvertures d'albums à ce moment-là. J'ai néanmoins eu un soucis avec les validateurs que j'ai voulu ajouter dans les fonctionnalités *create* et *update*. J'ai éliminé certains validateurs qui posaient soucis à ce moment-là, en mettant en tâche supplémentaire si j'ai du temps pour peaufiner. Le **Redirect::to()** ne fonctionnait pas car je n'arrivais pas à récupérer les données nécessaires à l'affichage du formulaire. J'ai donc opté pour un **Redirect::back()** malgré le fait que l'utilisateur doit recommencer à remplir le formulaire. J'ai ajouté l'affichage des erreurs par les messages du validateur.

J'ai perdu énormément de temps pour trouver un affichage du formulaire qui me convenait. Ma structure HTML n'était pas assez optimale pour obtenir le rendu souhaité avec le CSS. J'ai fini par remettre ce point à plus tard, après un rendu que j'estime correct, si j'ai du temps.

J'ai géré un peu différemment la fonctionnalité de suppression : je voulais utiliser le compteur d'articles que j'avais prévu dans ma table *albums*. Il y a donc deux formes de suppression : lorsque l'on appuie sur le bouton *acheter*, le compteur descend de 1, une fois arrivé à 0, l'objet est supprimé. La deuxième requête est réervée à l'administrateur du site : il peut supprimer un objet indépendament du compteur.

Concernant les fonctionnalités JS, j'ai voulu ajouter une requête ajax. Le principe est simple : lorsque l'utilisateur appuie sur le bouton 'infos' d'un album, cela affiche une modale avec les données reçues en requête ajax. J'aurais souhaité séparer un peu plus la requête de la création d'éléments HTML, mais je craignais de manquer de temps.

Je me suis penchée ensuite sur la gestion des routes et le système utilisateur / administrateur que je souhaitais ajouter. Au départ, j'avais prévu d'ajouter un middleware qui aurait géré les droits avec un fichier de config *acl* que j'aurais créé, mais comme je souhaitais aussi supprimer la possibilité de se connecter, il m'a paru plus logique de gérer les routes avec une simple gestion : *est-ce que l'utilisateur est connecté ?* J'ai donc simplement déplacé mes routes *utilisateur connecté* dans le groupe passant par le middleware de 'auth'.


## Informations
- Informations de connexion utilisateur :
  - email : **morgan@morgan.morgan**
  - mdp   : **morgan**
