# PROJET WEB - BTS 2SIO - Les jurons du Capitaine Haddock
**Contexte :** La médiathèque FunEnBulles est un établissement public, qui conserve et donne accès à différents types de médias (livre, BD, cd…), permettant la consultation sur place et l'emprunt à domicile. La médiathèque est une fusion des médiathèques FunEnBulles et LesMotsTordus.

**Objectifs du site :** La médiathèque souhaite disposer d’un site web lui permettant de mettre en avant la bande dessinée Tintin en permettant à ses jeunes lecteurs de pouvoir visualise et jouer avec les jurons du capitaine Haddock. Elle souhaite également disposer d’une interface d'administration lui permettant de mettre à jour sa base. Cette interface permettra l'ajout, la suppression et la modification de nouvelles bande-dessinées et jurons du capitaine Haddock.

**Élements fourni par la médiathèque :**
- Le script de la base de données actuelle
- Les images des couvertures des bande-dessinées

La partie principale (visualisation des bande-dessinées et des jurons, jeux) du site web sera ouverte au public sans besoins d'identifiant de connexion. La partie administration nécessitera un identifiant et un mot de passe qui vous sera fourni. L'administrateur pourra alors ajouter et supprimer d'autre compte d'administration.

------------

### Détails techniques :
**Langages et frameworks :**
- Langages de représentation des pages web : HTML / CSS
- Langage utilisé pour le côté serveur : PHP
- Base de données : MySQL
- Frameworks utilisés : Bootstrap, Symfony
-

**Connexion à la base de données :**
Les informations de connexion sont à rentrer dans le fichier *.env*, ligne 14 à 18 :
- PDO_DBNAME=
- PDO_HOST=
- PDO_CHARSET=
- PDO_USER=
- PDO_PASSWD=

**Script de base de données :**
Le script est fourni à la racine du projet : haddock_base.sql. Les informations de connexion du compte administrateur sont :
- Nom d'utilisateur : *admin*
- Mot de passe : *admin*

------------

Projet non terminé.