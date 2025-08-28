## Rapport Projet PHP - CPLR 2025

**Membres :**
- Laura Pelet
- Evariste Lourd
- Nathan Vazille
- Emilien Gineys

### Contexte du projet

Nous avons un script en Python va permettre de simuler différents outils météorologiques.<br>
Notre application permet de générer différents types de logs pour chaque outil.<br>
Pour le moment, les logs sont limités par le stockage par défaut de chaque appareil.

### Expression du besoin

Notre application doit être mise en conformité par rapport aux **recommandations de sécurité pour l’architecture d’un système de journalisation** de l'ANNSI.

### Objectif du projet

L'objectif du projet est de **centraliser les journaux** et de mettre en place un **dashboard** permettant de visualiser tous les logs, afin de répondre aux recommandations de l'ANSSI.

### Fonctions principales 

Le Dashboard du système de journalisation permet :
- de nous retourner le nombre de logs générés par jour
- le type de logs générés

### Critères de performances

Les logs seront envoyés en temps réel sur le dashboard.
Le dashboard sera rafraichis toutes les 5 minutes.

### Contraintes Techniques

Voici nos contraintes techniques :
- Architecture MVC (Modèles Vues Contrôleurs)
- Utilisation de Rsyslog

### Analyse : documents Anssi

- **R9. Centraliser les journaux** : ✅ -  Pris en compte (tout sur une même machine)

- **R10. Construire un service résiliant :** ❌ -  Non pris en compte (pas nécessaire pour notre système)

- **R11. Hiérarchisez les serveurs constituant le système de journalisation :** ❌ -  Non pris en compte (usage de BDD)

- **R12. Contrôler régulièrement la couverture de la chaîne de collecte des évènements :** ❌ -  Non pris en compte (nos équipements Météo sont contrôler différemment)

- **R13. Conserver les journaux dans le format natifs avant leur transfère :** ✅ -  Pris en compte (envoyer directement après leur création au rsyslog client + stockage complet dans la BDD)

- **R14. Privilégiez un transfert des journaux en temps réel :** ✅ -  Pris en compte 

- **R15. Faire une analyse de risques pour déterminer le transfert des journaux :** ❌ -  Non pris en compte (mode push par défaut)

- **R16. Utilisez des protocoles fiables pour le transfère des journaux :** ✅ -  Pris en compte 

- **R17. Utilisez des protocoles de sécurité :** ✅ -  Pris en compte

- **R18. Maitrisez le flux réseau consommé par le transfère des journaux :** ❌ -  Non pris en compte (pas nécessaire pour notre système)

- **R19. Durcir et maintenir les serveurs de collecte :** ✅ -  Pris en compte (prévision de maintenance)

- **R20. Cloisonnez les serveurs de collecte au sein d'un SI d'administration :** ❌ -  Non pris en compte (non nécessaire pour notre système)

- **R21. Dédiez une partition disque au stockage des journaux :** ❌ -  Non pris en compte (usage de BDD)

- **R22. Surpervisez l'espace disque du stockage des journaux :** ✅ -  Pris en compte (surveiller taille de BDD)

- **R23. Classez les journaux suivant leur thématique :** ❌ -  Non pris en compte (usage de BDD)

- **R23+. Privilégiez le stockage des journaux dans une BDD indexé :** ✅ -  Pris en compte (usage de BDD)

- **R24. Définir et appliquer une politique de rotation des journaux :** ❌ -  Non pris en compte (usage d'une durée de rétention des journaux)

- **R25. Configurer des durées de rétention des journaux :** ✅ -  Pris en compte (pour éviter le sur-stockage)

- **R26. Restreindre au strict besoin opérationnel les droits d'accès en écriture des journaux :** ❌ -  Non pris en compte (non nécessaire à notre système)

- **R26+. Restreindre au strict besoin opérationnel les droits d'accès en suppression des journaux :** ❌ -  Non pris en compte (non nécessaire à notre système)

- **R27. Restreindre au strict besoin opérationnel les droits d'accès en lecture des journaux :** ❌ -  Non pris en compte (non nécessaire à notre système)

- **R28. Etudiez l'alternative d'un ou de plusieurs système de journalisation en cas d'externalisation :** ❌ -  Non pris en compte (pas d'externalisation)

- **R29. Récupérez les journaux relatifs aux inter-connection en cas d'externalisation :** ❌ -  Non pris en compte (pas d'externalisation)

- **R30. Recourir à un PDIS en cas d'externalisation du stockage ou de la corélation de journaux :** ❌ -  Non pris en compte (pas d'externalisation)

- **R31. Collecter les journaux des postes en situation de nomadisme :** ❌ -  Non pris en compte (non nécessaire à notre système)

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

### Diagramme UML UseCase

### Schéma synoptique

### Documentation utilisateur 

# Se connecter

Pour se connecter au Dashboard, il vous suffit de renseigner cette URL : http://172.16.4.68/auth
Il faudra remplir les champs Email et Mot de passe avec les informations fournies par votre administrateur.

Une fois les champs remplit, cliquer sur le bouton "Se connecter".

# Consulter tous les logs

Pour accéder au Dashboard et consulter tous les logs (information et erreur), il vous suffit de vous connecter.
Le Dashboard avec tous les logs est la page d'accueil.

Dans le doute, vous pouvez cliquer sur le bouton "Accueil" présent en haut à gauche.

# Trier les logs par équipement

Pour trier les logs par équipement, vous avec une liste déroulante présente à gauche du bouton "Rafraîchir". 
Dans cette liste déroulante, sélectionner l'équipement que vous souhaitez choisir.
Pensez à cliquer sur le bouton "Rafraîchir" pour que votre filtre soit pris en compte.

# Trier les logs par catégorie (information / erreur)

Pour trier les logs par catégorie, vous avec une liste déroulante présente à gauche du bouton "Rafraîchir". 
Dans cette liste déroulante, sélectionner la catégorie que vous souhaitez choisir.
Pensez à cliquer sur le bouton "Rafraîchir" pour que votre filtre soit pris en compte.

# Gérer les utilisateurs

Seuls les comptes ayant le droit "Administrateur" peut gérer les utilisateurs.

Pour cela, il faut cliquer sur l'onglet à droite du bouton "Accueil", présent en haut à gauche.

Une fois arrivé sur la page de gestion des utilisateurs, vous pouvez :
 - Ajouter des utilisateurs
 - Modifier les informations des utilisateurs
 - Supprimer des utilisateurs