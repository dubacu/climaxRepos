# climaxRepos Docs

1. [Infos générales](#general-info)
2. [Technologies Utilisées](#technologies)
3. [Déploiement](#Deploiement)

## 1. Infos Générales
Dans ce projet, vous aurez deux volets : 

### Frontend
Il est accessible à partir de la racine du projet et comprends :
* Le dossier **assets** qui gère tous les fichiers multimédias ainsi que les librairies et plugins nécessaires à l’interface des données
* Le fichier **.htaccess** qui permet de redéfinir des URLs
* **Customers.php** pour la gestion des données des clients
* **Dashboard.php** pour gerer tous les modules du systemes et administrer le système
* **Files.php** pour la lecture des fichiers de données de type json, xml, csv, txt etc.
* **Footer.php** pour la gestion du pied de page des interfaces
* **Header.php** pour la gestion de l’entête  des interfaces  
* **Login.php** pour la gestion de l’interface de connexion
* **Navigation.php** pour la gestion du bloc de navigation pour toutes les interfaces
* **Users.php** pour la gestion des données  des utilisateurs

### Backend
il est accessible à travers le dossier **core** et dont les dossiers et fichiers essentiels sont : 
   1.  le dossier include qui contient : 
       * le dossier **managers** dont les fichiers contenus gèrent les accesseurs aux données des tables user et customers
       * le dossier **models** dont les fichiers definissent le modèle de données et facilient la manipulation des données des tables 
       * **DbConnect.php** qui configure et definit les variables d'acces à la base de données
       * **Handler.php** qui est un controleur principal
       * **Token.php** pas utilisé dans le systeme mais qui sera utile lorsque le fontend et le backend ne se trouvent pas sur le meme serveur et qu'on veille securiser la coommunication. la methode d'authentification utilisée est le Bearer et les tokens JWT(Json Web Tokens)
       * **Utils.php** pour defenir mes methodes de validations et verification syntaxique incluants des **regex**
  2. le dossier **middleware** pour le control des authentification et authorisation
  3. le dossier **upload** qui contient les fichiers de type json, xml, csv, et txt uploadés
  4. le fichier **index.php** qui est le routeur principal gerant l'ensemble des routes pour les APIs du système

## 2. Technologies utilisées
Coté Front end nous lui avons utilisé **Bootstrap** pour la mise en page du code **HTML**. **JQuery** a été utilisé pour l'écriture des scripts côté client. Afin d’actualiser certaines données d'une page sans procéder au rechargement total de cette page nous avons utilisé **AJAX** pour l’interrogation des APIs

Coté Back-end  nous avons utilisé **PHP** comme langage de programmation. Afin de bénéficier d’une architecture simplifiée, nous avons opté pour le **micro framework Slim** pour le développement.  En réalité Slim simplifie l’intégration du  MVC ce qui permet une séparation des différentes couches applicatives, facilitant le développement et la maintenance du logiciel. pour l'implementation des tokens d'authentification, nous utilisons **JWT**

Coté SGBD, nous avons utliser **mysql**.

## 2. Déploiement
pour deployer le projet climax veillez suivre les instructions suivantes
* Cloner le projet.
* une fois le projet cloné, vous verrez à l'interieur un fichier du nom de **climaxBD.sql** il sagit de la base de données sql à uploader dans le SGBD
* apres avoir importé la base de données entrez dans le fichier **climax/core/incldue/DbConnect.php** et modifiez les variables de connexion à votre base de données
* le système ainsi pret à etre utilisé: veillez utilisez les information suivantes pour vous connecter
      * profil USER : **( username : zoure@gmail.com || password : 123456)**
      * profil ADMIN : **(username : kevinkabor@gmail.com || password : 123456)**




