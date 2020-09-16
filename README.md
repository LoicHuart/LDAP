# CONTRIBUTORS

HUART Loïc

# CONTEXT

Ce projet a pour but de générer un fichier Ldif des nouveaux étudiants afin de les importer dans un serveur Ldap (service d'annuaire), les étudiants créer leur compte qui sont enregistrés temporairement dans une base de donné MySql, l’administrateur choisi s'il les accepte ou non, s'ils sont acceptés ils sont ajouté au fichier Ldif et supprimé de la base de donner MySql, s'ils sont refusés, ils sont supprimés de la base de donner MySql 

# DEPLOYMENT

1. Cloner le projet de GITLAB via l'url.
2. Créer la base de donné MySQL en important le fichier "SQL.sql".
3. Ajouter vos ID de connexion de MYSQL dans le fichier "M/manager.php" a la ligne 43.
4. Ajouter vos ID de connexion au serveur LDAP dans le fichier "M/manager.php" a la ligne 124.

# UTILISATION 

1. la page "s'enregistrer" permet au nouveaux étudiants de créer leurs compte.
2. L'administrateur peut accéder à la page de connection via le bouton "admin".
    1. La liste du haut  correspond au compte à valider ou à refuser.
    2. La liste du bas correspond au compte validé.
    3. Entre le nom du groupe au quel vous souhaité qu'il soit ajouter, puis valider/refuser un compte, cocher la case puis cliquer sur valider/supprimer en haut a droite.
    4. Une fois que vous avez fini de trier les comptes, cliquer sur "create ldif" puis "télécharger ldif".
    5. Importer le fichier Ldif sur le serveur LDAP.
