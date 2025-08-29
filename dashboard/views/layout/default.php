<!doctype html>
<html lang="fr" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="refresh" content="300">
  <title><?= isset($title) ? htmlspecialchars($title) : 'Dashboard Syslog' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../../img/Dashboard-icon.png">
  <style>
    body { background: #f6f7fb; }
    .navbar-brand { font-weight: 700; letter-spacing:.2px; }
    .card { border: 0; box-shadow: 0 6px 20px rgba(0,0,0,.06); border-radius: 14px; }
    .table thead th { background: #f0f2f6; font-weight:600; }
    .message-cell { white-space: pre-wrap; max-width: 640px; }
    .badge-rounded { border-radius: 999px; }
    footer { color:#7a8395; }
  </style>
</head>
<body>
  <!-- LAYOUT DEFAULT LOADED -->
  <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
      <a class="navbar-brand" href="/<?= defined('WEBROOT2') ? htmlspecialchars(WEBROOT2) : '' ?>">Syslog Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="/<?= defined('WEBROOT2') ? htmlspecialchars(WEBROOT2) : '' ?>">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-secondary btn-sm mt-1" href="<?= defined('WEBROOT2') ? htmlspecialchars(WEBROOT2) : '' ?>/">Gestion utilisateurs</a>
          </li>
        </ul>
        <div class="d-flex">
          <a class="btn btn-outline-danger btn-sm" href="<?= defined('WEBROOT2') ? htmlspecialchars(WEBROOT2) : '' ?>/auth">Déconnexion</a>
        </div>
      </div>
    </div>
  </nav>

  <main class="container my-4 my-md-5">
    <?= $content_for_layout /* NE PAS SUPPRIMER */ ?>
  </main>

  <footer class="container py-4 small">
    <div class="d-flex justify-content-between">
      <span>© <?= date('Y') ?> – Syslog Dashboard</span>
      <span class="d-none d-sm-inline">Bootstrap 5</span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
