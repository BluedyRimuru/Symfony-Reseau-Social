````

                                                          
````

# Site internet - Réseau Social 

## Préambule

Ce projet a été réalisé par [moi-même](https://github.com/BluedyRimuru) lors de mes vacances de fin de [BTS SIO en option SLAM](https://www.onisep.fr/ressources/univers-formation/Formations/Post-bac/bts-services-informatiques-aux-organisations-option-b-solutions-logicielles-et-applications-metiers).

## Installation

Ce projet a été crée sous [Symfony](https://symfony.com/) et vous aurez besoin de celui-ci.
Vous devez ensuite récupérer le projet en effectuant la commande ci-dessous :
```bash
$ git clone https://github.com/BluedyRimuru/Symfony-Reseau-Social.git # HTTPS mais vous sélectionnez le lien que vous voulez.
```
## Base de données

Pour l'installation du projet, vous devrez effectuer les commandes suivantes :
```shell
$ cp .env-example .env # Une copié, vous devrez le configurer avec vos informations
$ composer require symfony/runtime # Installation des vendors
```

Une fois que vous avez entré vos informations de base de données dans le fichier d'environnement précédemment copié,
vous devrez également ajouter un mailer sur la ligne MAILER_DSN, pour cela rendez-vous sur [MailerTrap](https://mailtrap.io/) et sélectionnez
"Symfony +5" dans la partie "Integrations".

Pour créer la base de données, veuillez effectuer les commandes suivantes :
```shell
$ symfony console doctrine:database:create # Permet de créer une base de données vierge
$ symfony console doctrine:migrations:migrate # Création des tables dans votre base de données
$ symfony console doctrine:fixtures:load # Génération d'un jeu de données aléatoire
```

Nous proposons aussi l'installation via [Docker](https://www.docker.com/) (Actuellement non fonctionnelle) :

```shell
$ docker-compose create # Création du conteneur
$ docker stop $(docker ps -a -q) # Stopper tous les conteneurs
$ docker-compose start # Démarrer les conteneurs
```

Lorsque l'installation est terminée, vous pouvez lancer le projet avec la commande suivante :
```shell
$ symfony server:start
```

## Utilisateurs

Pour les utilisateurs, les identifiants sont dans la base de données et pour chaque rôle son mot de passe :
```
Admin : "admin"
Eleve : "michel"
```
Vous avez aussi la possibilité de créer votre propre compte sur le site grâce au mailer. 



