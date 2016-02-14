 
Bonjour,

Pour utiliser l'application Twoot voici les instructions à suivre :

Premièrement, tapez la commande :

$ php -S localhost:9090 /votre/directory/uFrame/web

et à la racine du dossier (pour les dépendances) :

composer install

Un serveur va démarrer, il faut ensuite installer la base de données et démarrer le docker.

$ docker run -d -p 3306 \
    --name mysql \
    --volumes-from data_mysql \
    -e MYSQL_USER=uframework \
    -e MYSQL_PASS=password \
    -e ON_CREATE_DB=uframework \
    tutum/mysql
    
Voici la commande à entrer, le port SEULEMENT est modifiable, pour notre application nous avons utilisé le port 32768.
La database se nomme bien uframework, l'user aussi et le mot de passe est password.

Maintenant il faut utiliser le script SQL fourni pour créer nos tables. Chose possible en tapant cette comande :

$ mysql uframework -h127.0.0.1 -P32768 -uuframework -ppassword < app/config/schema.sql
    

Tout est en place, voici les actions possibles :

- Se logger, se déconnecter et s'enregistrer
- Ajouter et supprimer un status

"/" > mène à la page d'accueil
"/status"> mène à la page contenant les status
"/status/{id}" > mène à la page contenent un statut précis (il faut être l'auteur pour pouvoir faire une action)
"/login" > mène à la page de connexion
"/logout" > déconnecte l'utilisateur
"/register" > mène à la page d'enregistrement

Ce qui a été fait :
- Un modèle fonctionnel avec une DAL, des DataMappers et des Finders pour nos deux POPO (User et Statuse)
- Un système de request/response
- Un design "basique" avec BootStrap
- Une API (get et post des status)
- Des tests sur différentes parties de l'application (API, DataMappers etc..)

Ce qui n'a pas été fait :
- Mettre des critères dans l'url (par exemple /status?LIMIT=5&...")
- Manque de tests selon nous
- Système de profil
- Système de templating trop faible (répétition, manque d'include etc)

Merci d'avoir pris le temps de lire.

 
