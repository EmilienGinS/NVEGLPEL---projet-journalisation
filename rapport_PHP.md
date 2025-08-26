## Rapport Projet PHP - CPLR 2025

### Contexte du projet

Nous avons une application qui représente un script Python.
Ce script va permettre de simuler différents outils météorologiques.
Notre application permet de générer différents types de logs.
Ces derniers ne sont pas stockés.

### Expression du besoin

Notre application doit être conforme aux normes de Anssi.

### Objectif du projet

L'objectif du projet est de mettre en place un dashboard permettant de visualiser tous les logs.

### Fonctions principales 

Le Dashboard du système de journalisation permet :
- de nous retourner le nombre de logs générés par jour
- le type de logs générés

### Critères de performances

Les logs seront envoyés en temps réel sur le dashboard.
Le dashboard fere un refresh toutes les 5 minutes.

### Contraintes Techniques

Voici nos contraintes techniques :
- Architecture MVC (Modèles Vues Contrôleurs)

### Liste des livrables

Voici notre liste des livrables :
- Un Dashboard
- Rsyslog (client et serveur)
- Base de donnée (MySql)
- Test de validation

### Enoncé des tâches à réaliser par livrable / répartition par étudiant

Liste des tâches (par livrable / réparti par étudiant):
- Dashboard
    - Intallation serveur web : Nathan
    - Création du Dashboard : Emilien
- Base de donnée
    - Installation Base de donnée : Evariste
    - Configuration Base de donnée : Emilien
- Rsyslog (client et serveur)
    - Installation Rsyslog client : Laura
    - Installation Rsyslog serveur : Laura
- Test de validation
    - Création liste des tests de validation : Nathan
    - Réalisation des tests de validation : Evariste
