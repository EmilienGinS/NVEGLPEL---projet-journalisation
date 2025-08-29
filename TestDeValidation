## Tests de validation de la VM COLLECTEUR

| Cas d’utilisation                          | État initial                                          | Action                                   | Résultat attendu                                      | Résultat obtenu |
|--------------------------------------------|------------------------------------------------------|------------------------------------------|-------------------------------------------------------|-----------------|
| Vérifier la connectivité réseau | La VM est démarrée et connectée au réseau | ping 8.8.8.8 depuis la VM | Réception de réponses avec un temps de latence normal | Réponses reçues avec un temps de latence stable |
| Vérifier accès IP de la VM depuis le poste | La VM a une IP statique (172.16.4.68)  | ping 172.16.4.68 depuis le poste client | Réception de réponses | Réponses reçues avec succès |
| Vérifier qu’Apache est accessible en réseau | Apache est actif, VM accessible depuis le LAN    | Ouvrir http://172.16.4.68 depuis client | Affichage de la page par défaut Apache | Page par défaut Apache affichée correctement |
| Vérifier le déploiement du site | Le dossier /var/www/dashboard contient index.html | Ouvrir http://172.16.4.68 dans le navigateur | Affichage du texte Hello There | Texte "Hello There" affiché correctement |


## Tests de validation du Dashboard

| Cas d’utilisation | État initial | Action | Résultat attendu | Résultat obtenu |
|-------------------|--------------|--------|------------------|-----------------|
| Accéder à la page d’accueil du dashboard | VM collecteur et service web démarrés, réseau OK | Ouvrir `http://172.16.4.68` dans le navigateur | La page d’accueil du dashboard s’affiche sans erreur , avec le menu et la liste des logs | Page d’accueil affichée correctement avec menu et liste des logs |
| Affichage initial des logs | Base/flux de logs disponibles | Depuis l’accueil, observer la liste | Les derniers logs apparaissent triés par date décroissante, avec colonnes (ID, Date, Heure, Facility, Priority, FromHost, Message) | Liste des logs affichée correctement, triée par date décroissante |
| Filtrer par appareil (sélection simple) | Au moins 2 appareils ont des logs | Dans le filtre “Instruments”, choisir `HYDR24` | Seuls les logs de `HYDR24` s’affichent | Filtrage appliqué, seuls les logs de `HYDR24` visibles |
| Filtrer par appareil (réinitialiser) | Un filtre appareil est actif | Cliquer “Instruments : Tous” | Tous les logs réapparaissent (état par défaut) | Tous les logs réaffichés correctement |
| Filtrer par niveau “Erreur” | Logs avec niveaux “Erreur” et “Info” disponibles | Dans le filtre “Catégories”, choisir “Erreur” | Seuls les logs de niveau “Erreur” s’affichent (badge rouge) | Seuls les logs “Erreur” visibles avec badge rouge |
| Filtrer par niveau “Info” | Idem ci-dessus | Dans le filtre “Catégories”, choisir “Info” | Seuls les logs de niveau “Info” s’affichent (badge bleu) | Seuls les logs “Info” visibles avec badge bleu |
| Filtre combiné (Appareil + Niveau) | Logs multi-appareils et multi-niveaux présents | Sélectionner `BAR23` **et** “Erreur” | La liste ne montre que les erreurs de `BAR23` | Résultat conforme : uniquement les erreurs de `BAR23` affichées |
| Aucun résultat (filtre trop restrictif) | Filtres combinés ne renvoient rien | Appliquer un filtre qui ne matche aucun log | Message “Aucune Donnée” affiché, pas d’erreur JS | Message “Aucune Donnée” affiché correctement |
| Rafraîchissement manuel | De nouveaux logs arrivent | Cliquer sur “Rafraîchir” | Les nouveaux logs apparaissent en haut de la liste | Nouveaux logs affichés en haut de la liste après rafraîchissement |
| Navigation accueil → autre page → accueil | Menu opérationnel | Aller sur une autre vue, puis revenir sur “Accueil” | Retour à la liste des logs fonctionnelle, sans perte de session | Navigation fonctionnelle, retour correct à la liste des logs |
| Déconnexion (logout) | Utilisateur authentifié | Cliquer sur “Déconnexion” | Redirection vers la page de connexion | Déconnexion réussie, redirection vers la page de connexion |
| Connexion (login) | Page de connexion affichée | Entrer identifiants et valider | Accès au dashboard si identifiants corrects | Connexion réussie, accès au dashboard autorisé |
