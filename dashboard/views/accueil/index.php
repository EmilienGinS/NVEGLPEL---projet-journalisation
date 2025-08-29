<?php
$facilityMap = [
  16 => 'TEMP11',
  17 => 'PLUV12',
  18 => 'BAR13',
  19 => 'HYDR14',
  20 => 'TEMP21',
  21 => 'NivUV22',
  22 => 'BAR23',
  23 => 'HYDR24',
];
$selFacility = isset($_GET['facility']) ? (string)$_GET['facility'] : '';
$selPriority = isset($_GET['priority']) ? (string)$_GET['priority'] : '';

?>
<div class="d-flex align-items-center justify-content-between mb-4">
  <div>
    <h1 class="h3 mb-1">Accueil</h1>
    <div class="text-muted">Derniers événements syslog</div>
  </div>

  <div class="text-center text-muted small mt-3">
    Rafraîchissement automatique dans <span id="countdown">300</span> secondes
  </div>

  <div>
    <form class="d-flex align-items-center gap-2" method="get"
          action="/<?= defined('WEBROOT2') ? htmlspecialchars(WEBROOT2) : '' ?>">
      <select name="facility" class="form-select form-select-sm" onchange="this.form.submit()">
        <option value="">Instruments : Tous</option>
        <?php foreach ($facilityMap as $val => $label): ?>
          <option value="<?= (int)$val ?>"
            <?= ($selFacility !== '' && (string)$val === $selFacility) ? 'selected' : '' ?>>
            <?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?>
          </option>
        <?php endforeach; ?>
      </select>

      <select name="priority" class="form-select form-select-sm" onchange="this.form.submit()">
        <option value="">Catégories : Toutes</option>
        <option value="3" <?= $selPriority === '3' ? 'selected' : '' ?>>Erreur</option>
        <option value="6" <?= $selPriority === '6' ? 'selected' : '' ?>>Info</option>
      </select>

      <button type="submit" class="btn btn-outline-secondary btn-sm">Rafraîchir</button>
    </form>
  </div>
</div>
<!---<pre>
    <?php print_r($events[0]);?>
</pre>
--->
<div class="card">
  <div class="card-body p-0">
    <?php if (!empty($events)): ?>
      <div class="table-responsive">
        <table class="table table-hover table-striped align-middle mb-0">
          <thead>
            <tr>
              <th style="width:90px;">ID</th>
              <th style="width:90px;">Date</th>
              <th style="width:90px;">Heure</th>
              <th style="width:80px;">Facility</th>
              <th style="width:80px;">Priority</th>
              <th style="width:160px;">FromHost</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($events as $row): 
                $datetime = $row->DeviceReportedTime;
                list($date, $time) = explode(" ", $datetime);
                $dateObj = new DateTime($date);
                $dateFormatted = $dateObj->format("d/m/Y");
                ?>
              <tr>
                <td class="fw-semibold"><?= $row->ID ?></td>
                <td><?= $dateFormatted ?></td>
                <td><?= $time ?></td>
                <td>
                    <?= htmlspecialchars($facilityMap[(int)($row->Facility ?? -1)] ?? (string)($row->Facility ?? ''), ENT_QUOTES, 'UTF-8') ?>
                </td>
                <td>
                    <?php
                        $p = isset($row->Priority) ? (int)$row->Priority : null;
                        if ($p === 3) {
                            echo '<span class="badge rounded-pill text-bg-danger">Erreur</span>';
                        } elseif ($p === 6) {
                            echo '<span class="badge rounded-pill text-bg-info">Info</span>';
                        } else {
                            // fallback: on affiche la valeur brute si autre chose que 3/6
                            echo htmlspecialchars((string)($row->Priority ?? ''), ENT_QUOTES, 'UTF-8');
                        }
                    ?>
                </td>
                <td><?= $row->FromHost ?></td>
                <td class="message-cell"><?= $row->Message ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="p-4">
        <div class="alert alert-secondary mb-0">
          Aucune donnée.
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<script>
  let remaining = 300; // 5 minutes en secondes
  const countdownEl = document.getElementById('countdown');

  function updateCountdown() {
    remaining--;
    if (remaining <= 0) {
      location.reload();
    } else {
      countdownEl.textContent = remaining;
    }
  }

  // affiche la valeur initiale
  countdownEl.textContent = remaining;

  // décrémente chaque seconde
  setInterval(updateCountdown, 1000);
</script>