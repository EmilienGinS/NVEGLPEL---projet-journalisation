<!doctype html>
<html lang="fr" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="../../img/Dashboard-icon.png">
  <style>
    body { background: #f0f2f5; }
    .card { border: 0; box-shadow: 0 6px 20px rgba(0,0,0,.06); border-radius: 14px; }
    .form-header { font-weight: 700; color: #1a202c; }
    .form-control { border-radius: 8px; }
    .btn-primary { border-radius: 8px; }
  </style>
</head>
<body>

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