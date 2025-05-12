# ⛺️ ScoutPath

## Sommaire
- [Introduction](#-introduction)
- [Histoire](#-histoire)
- [Architecture](#-architecture)
    - [Back-end](#back-end)
    - [Front-end](#front-end)
- [Installation](#-installation)
    - [GIT](#git)
    - [Back-end](#back-end-1)
    - [Front-end](#front-end-1)
    - [Setup](#setup)
- [Accès](#-accès)
    - [Localhost](#localhost)
    - [Compte](#compte)
- [Api](#-api)
- [Réalisation](#️-réalisation)

---

## 🏁 Introduction

**ScoutPath** est une histoire interactive en lien au monde du scoutisme. La première histoire permet aux users de tester leurs connaissances par unités (aux scouts, les enfants sont divisés en plusieurs unités) et en fonction des réponses, gagner des points ou non. Un certains nombres de points permet de passer au chapitre suivant (unité suivante).

Ce projet a été réalisé dans le cadre les cours de WebMobUI et de DévProdMéd durant le 2e semestre de la formation d'Ingénierie des Médias de la HEIG-VD. Il est construit en Laravel et en Vue.js.

---

## 📙 Histoire

Actuellement, seule une histoire est disponible. Elle est structurée de la manière suivante :

- **Histoire** : Une histoire comporte plusieurs chapitres. Ces derniers requièrent un certain nombre de points afin d'être débloqués.
- **Chapitres** : Un chapitre comporte plusieurs questions.
- **Questions** : Chaque question comporte 2 choix.
- **Choix** : L'un juste qui donne des points et un second qui n'impacte pas l'utilisateur.

---

## 🚧 Architecture

```
projet
├── back-end/
├── front-end/
├── readme.md
├── .gitignore
```

### Back-end

- **Framework**
    - Laravel
- **Bases de données**
    - SQLite
    - Structure Eloquent :
        - User
        - Story
        - Chapter
        - Riddle
        - Choice
        - ProgressionLog
    - Construction :
        - `Migrations`
        - `Models`
        - `Controllers`
        - `Seeders`
        - `Request`
- **Authentification**
    - Breeze
- **Routes**
    - api.php
    - Versionning et préfixes `…/api/v1/…`
    - La majorité sont protégées par un middleware `Sanctum`

### Front-end

- **Framework**
    - Vue.js
- **Composants**
    - `Login.vue`
    - `Register.vue`
    - `Story.vue`
    - `Chapter.vue`
    - `Riddle.vue`
    - `Header.vue`
- **Routes**
    - La navigation se fait avec `Vue-router`
- **Communication avec le back-end**
    - Les reqêtes HTTP vers l'API se font avec `Axios`
- **Design**
    - `CSS`
    - Responsive (smartphone, tablet, desktop)

---

## 💻 Installation


### GIT

1. Cloner le répértoire GIT

```bash
git clone https://github.com/floriansalvi/HEIG-VD_Fullstack_ScoutPath.git
cd projet-fullstack
```

### Back-end

1. Installer les dépendances

```bash
cd back-end
composer install
```

2.  Configurer le fichier `.env`

```bash
cp .env.example .env
php artisan key:generate
```

3. Effectuer les migrations et les seeders

```bash
php artisan migrate
php artisan db:seed
```

4. Démarrer le serveur back-end

```bash
php artisan serve
```

### Front-end

1. Installer les dépendances

```bash
cd ../front-end
npm install
```

2. Démarrer le serveur front-end

```bash
npm run dev
```

### Setup

Si tu ne veux pas devoir exécuter ces commandes manuellement, `setup.sh` te permettre d'effectuer toutes ces étapes en 2 commandes.

```bash
chmod +x setup.sh
./setup.sh
```

---

## 🌐 Accès

### Localhost

- Back-end : [http://localhost:8000](http://localhost:8000)
- Front-end : [http://localhost:5173](http://localhost:5173)

Le port utilisé par l'application front-end peut être adapté mais, cela doit être fait manuellement dans les fichiers `/back-end/config/cors.php` et `/back-end/.env`

### Compte

Voici les informations d'identification du compte déjà crée lors de l'initialisation du projet.

```
Nom : John Doe
Email : johndoe@scoutpath.ch
Mot de passe : Heig2025
```

---

## 📂 API

1. Les route publiques

| Méthode | Route publique                       | Utilisation                                              |
|--------:|:-------------------------------------|:---------------------------------------------------------|
| POST    | `/api/register`                      | Créer un nouveau profil utilisateur                      |
| POST    | `/api/login`                         | Authentifier l'utilisateur et générer un token personnel |
| GET     | `/api/v1/stories`                    | Obtenir la liste de toutes les histoires disponibles     |

2. Les route privées

| Méthode | Route privée                         | Utilisation                                              |
|--------:|:-------------------------------------|:---------------------------------------------------------|
| GET     | `/api/user`                          | Récupérer les infos d'un utilisateur                     |
| POST    | `/api/logout`                        | Déconnecter un utilisateur                               |
| GET     | `/api/v1/stories/{story}`            | Récupérer les détails d'une histoire                     |
| GET     | `/api/v1/stories/{story}/chapters`   | Récupérer la liste de chapitres d'une histoire           |
| GET     | `/api/v1/chapters/{chapter}`         | Récupérer les détails d'un chapitre                      |
| GET     | `/api/v1/chapters/{chapter}/riddles` | Récupérer la liste d'énigmes d'un chapitre               |
| GET     | `/api/v1/riddles/{riddle}`           | Récupérer les détails d'une énigme                       |
| GET     | `/api/v1/riddles/{riddle}/choices`   | Récupérer la liste de choix d'une énigme                 |
| GET     | `/api/v1/choices/{choice}`           | Récupérer les détails d'un choix                         |
| GET     | `/api/v1/progress`                   | Récupérer la liste de progression d'un utilisateur       |
| GET     | `/api/v1/progress/{storyId}`         | Récupérer la progression dans une histoire               |
| POST    | `/api/v1/progress`                   | Enregister ou mettre à jour une progression              |
| DELETE  | `/api/v1/progress/{storyId}`         | Supprimer la progression d'une histoire                  |

---

## 💁🏻‍♂️ Réalisation

**Florian Salvi**  
Haute École de Gestion et d'Ingénierie du Canton de Vaud  
Ingénierie des Médias  
Semestre S4 - 2025  
Classe M52-2