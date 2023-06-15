![separe](https://github.com/studoo-app/.github/blob/main/profile/studoo-banner-logo.png)
# TP APM

## SETUP PROJET

### 1. Fork du projet 
Installation du projet se fait via les outils composer et git. \
Dans un premier temps, il faut faire un fork du repository sur votre espace de travail
Puis cloner le projet sur votre machine

### 2. Fichier de configuration
Une fois que la commande "git clone" est effectué, vous devez créer votre fichier de configuration projet (dotenv) \
Ce fichier doit s'appeler ".env", vous pouvez partir du fichier exemple nommé ".env.example"

Une fois les fichiers crées, vous pouvez adapter les valeurs des variables définies

````shell
cp _.env.example .env &&  cp app/_.env.example app/.env
````

### 3. Installation des librairies
La prochaine étape concerne l'installation des librairies du projet. Cette installation se fait par l'outil "composer". \
Composer est un gestionnaire de package. Son utilité est assurée la compatibilité et l'installation entre les différentes versions de librairie.

````shell
cd app && composer install && cd ..
````

### 4. Installation de la base de donnée
La base de donnée est un fichier sql. Elle se trouve dans le répertoire "docs/app_db.sql" 
Vous pouvez l'importer dans votre gestionnaire de base de donnée (phpmyadmin, mysql workbench, ...)

### 5. Démarrage du projet
Démarrer docker
````shell
docker compose up -d
````

Demarrer ton projet via le serveur PHP
````shell
cd app && composer start && cd ..
````

### 6. Accès au projet
Le projet est accessible via l'url suivante : http://localhost:8042

### 7. Accès à la base de donnée
La base de donnée est accessible via l'url suivante : http://localhost:8081

### 8. Accès au mailcatcher
Le mailcatcher est accessible via l'url suivante : http://localhost:1080

### 9. Stopper le projet
````shell
docker compose down
````

______

### DEV PROJET
En cas de création ou de mise a jour des classes du projet, faire la commande de autoloader
````shell
$ cd app && composer dump-autoload && cd ..
````

#### DEV STACK
| Version | Service                                                             | DESCRIPTION                      |
|:--------|:--------------------------------------------------------------------|:---------------------------------|
| ^5.5    | [vlucas/phpdotenv](https://packagist.org/packages/vlucas/phpdotenv) | Loads environment variables      |
| ^3.5    | [twig/twig](https://packagist.org/packages/twig/twig)               | Template Engine (VIEW couch)     |
| ^1.3    | [nikic/fast-route](https://packagist.org/packages/nikic/fast-route) | Router Engine (CONTROLLER couch) |
| ^8.0    | [PHP Engine](https://www.php.net/downloads.php)                     | Engine PHP                       |  
| ^2.0    | [Composer](https://getcomposer.org/download/)                       | Dependency Manager               | 
| ^9.5    | [PHPUnit](https://phpunit.de/)                                      | Testing Engine                   |

______
### TESTING
Les tests unitaires sont réalisés via PHPUnit. 

```shell
cd app && composer test && cd ..
```
