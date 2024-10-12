# API du Tableau pèriodique des éléments

- Projet : Mise en place d'une plateforme de partage d'informations sur le tableau périodique des éléments.  
- Visualisation : Affichage du tableau périodique avec différents filtres interactifs et définitions associées.  

- Détails des éléments : Présentation complète des informations et descriptions spécifiques pour chaque élément, incluant actuellement vingt-huit caractéristiques dans la fiche technique. Ce nombre augmentera progressivement.  

- Back-office utilisateur : Accès aux données du tableau ainsi qu'à la documentation de l'API pour la récupération des éléments.  

- Back-office administrateur : Accès aux fonctionnalités utilisateur avec, en plus, la possibilité de modifier les éléments et les définitions.

- Back-office super_administrateur : Gestion complète du système et des utilisateurs.  

- Mise en place de l'API : Requêtes GET, gestion des erreurs, pagination et mise en cache.

Principe d'installation : 

- Clonez le dépôt GitHub sur votre machine locale
- Le dossier vendor n'est pas inclus dans le dépôt, il est donc nécessaire d'installer les dépendances via Composer. Utiliser la commande "composer install".
- Dupliquez le fichier .env en créant un fichier .env.local, puis configurez-le avec les informations de connexion à la base de données.


