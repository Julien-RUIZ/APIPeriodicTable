# API du Tableau pèriodique des éléments

- Projet : Mise en place d'une plateforme de partage d'informations sur le tableau périodique des éléments.  
- Visualisation : Affichage du tableau périodique avec différents filtres interactifs et définitions associées.  
  <img alt="Tableau périodique des éléments" height="150" src="C:\wamp64\www\APIPeriodicTable\APIPeriodicTable\public\images\Tableau.png" title="Tableau Mendeleïev" width="300"/>

- Détails des éléments : Présentation complète des informations et descriptions spécifiques pour chaque élément, incluant actuellement vingt-huit caractéristiques dans la fiche technique. Ce nombre augmentera progressivement.  
  <img alt="Regroupement des données d&#39;un éléments" height="150" src="C:\wamp64\www\APIPeriodicTable\APIPeriodicTable\public\images\Information_element.png" title="Fiche technique" width="300"/>

- Back-office utilisateur : Accès aux données du tableau ainsi qu'à la documentation de l'API pour la récupération des éléments.  
  <img height="150" src="C:\wamp64\www\APIPeriodicTable\APIPeriodicTable\public\images\Documentation_Api.png" title="Documentation" width="300"/>

- Back-office administrateur : Accès aux fonctionnalités utilisateur avec, en plus, la possibilité de modifier les éléments et les définitions.

- Back-office super_administrateur : Gestion complète du système et des utilisateurs.  
  <img height="150" src="C:\wamp64\www\APIPeriodicTable\APIPeriodicTable\public\images\Back-office.png" title="Back-office administrateur" width="300"/>

- Mise en place de l'API : Requêtes GET, gestion des erreurs, pagination et mise en cache.

Principe d'installation : 

- Clonez le dépôt GitHub sur votre machine locale
- Le dossier vendor n'est pas inclus dans le dépôt, il est donc nécessaire d'installer les dépendances via Composer. Utiliser la commande "composer install".
- Dupliquez le fichier .env en créant un fichier .env.local, puis configurez-le avec les informations de connexion à la base de données.


