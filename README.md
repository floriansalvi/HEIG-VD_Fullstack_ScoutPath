# ⛺️ ScoutPath

## Sommaire
- [Introduction](#introduction)
- [Histoire](#histoire)
- [Architecture](#architecture)
    - [Back-end](#back-end)

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
        - Migrations
        - Models
        - Controllers
        - Seeders
        - Request
- **Authentification**
    - Breeze
- **Routes**
    - api.php
    - versionning et préfixes (…/api/v1/…)
    - La majorité sont protégées par un middleware (Sanctum)

## Front-end

-