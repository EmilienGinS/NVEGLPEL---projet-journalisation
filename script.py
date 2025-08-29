"""
Programme de simulation et de journalisation des erreurs de capteurs.

Ce script génère aléatoirement des codes d'erreur pour une liste de capteurs simulés,
puis consigne ces événements dans :
  - des fichiers de logs locaux (via le module logging),
  - le système de journalisation syslog (via le module syslog).

Les erreurs générées couvrent différents scénarios : valeur valide, valeur hors-plage,
absence de signal, identifiant non reconnu et erreur inconnue.

Modules utilisés :
    - logging : journalisation locale des événements
    - syslog : envoi des événements au journal système
    - random : génération pseudo-aléatoire des codes d'erreur
    - datetime : création de noms de fichiers horodatés
"""

# pylint: disable=line-too-long

import logging
import syslog
import random
from datetime import datetime

logger = logging.getLogger(__name__)

liste_id = [
    "TEMP11",
    "PLUV12",
    "BAR13",
    "HYDR14",
    "TEMP21",
    "NivUV22",
    "BAR23",
    "HYDR24",
]


def creer_fichier_log(log_name, type_erreur, id_err):
    """
    Crée ou met à jour un fichier de log avec un message correspondant au type d'erreur.

    Args:
        log_name (str): Chemin du fichier de log à créer ou mettre à jour.
        type_erreur (int): Code numérique indiquant le type d'erreur ou d'événement.
            - <= 8  : valeur récupérée correctement
            - 9-11  : valeur non significative
            - 12-14 : absence de signal
            - 15-17 : identifiant non valide
            - > 17  : erreur inconnue
        id_err (str | int): Identifiant du capteur concerné ou valeur associée.

    Returns:
        None
    """

    logging.basicConfig(
        level=logging.DEBUG,
        filename=log_name,
        encoding="utf-8",
        format="%(asctime)s - %(levelname)s - %(message)s",
    )

    if type_erreur <= 8:
        logging.info("%i : valeur récupérée correctement", id_err)
    elif 8 < type_erreur <= 11:
        logging.error("%i : valeur non significative", id_err)
    elif 11 < type_erreur <= 14:
        logging.error("%i : absence de signal", id_err)
    elif 14 < type_erreur <= 17:
        logging.error("?????? : id non valide")
    elif type_erreur > 17:
        logging.error("%i : erreur inconnue", id_err)


for i, appareil in enumerate(liste_id):

    type_err = random.randint(0, 20)
    syslog.openlog(logoption=syslog.LOG_PID, facility=syslog.LOG_LOCAL0 + (i * 8))

    log_filename = datetime.now().strftime("./log/logging_%Y-%m-%d_%H-%M-%S.log")

    creer_fichier_log(log_filename, type_err, appareil)

    MESSAGE_ERR_RAND = "ERR" + str(random.randint(1000, 9999))

    if type_err <= 8:
        syslog.syslog(
            syslog.LOG_INFO,
            f"Mesure récupérée. La valeur du capteur est dans la plage normale.",
        )
    elif 8 < type_err <= 11:
        syslog.syslog(
            syslog.LOG_ERR,
            f"Valeur hors-plage. Le capteur a renvoyé une valeur inattendue ou physiquement impossible. [{MESSAGE_ERR_RAND}]",
        )
    elif 11 < type_err <= 14:
        syslog.syslog(
            syslog.LOG_ERR,
            f"Erreur de connexion. Absence de réponse du capteur ou délai d'attente dépassé. [{MESSAGE_ERR_RAND}]",
        )
    elif 14 < type_err <= 17:
        syslog.syslog(
            syslog.LOG_ERR,
            f"ID de capteur non reconnu. L'identifiant fourni ne correspond à aucun appareil enregistré. [{MESSAGE_ERR_RAND}]",
        )
    elif type_err > 17:
        syslog.syslog(
            syslog.LOG_ERR,
            f"Erreur de traitement inconnue. Un événement imprévu s'est produit. Vérifier les journaux du système pour plus de détails. [{MESSAGE_ERR_RAND}]",
        )

    syslog.closelog()
