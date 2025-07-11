<h2>Facturas</h2>
<a class="btn btn-secondary mb-2" href="./?controller=facturas&action=generar">Generar Facturas Mes Actual</a>
<form class="form-inline mb-2" method="get">
  <input type="hidden" name="controller" value="facturas">
  <div class="form-group mr-2">
    <select class="form-control" name="apoderado_id">
      <option value="">Todos los Apoderados</option>
      <?php foreach($apoderados as $a): ?>
      <option value="<?= $a['id'] ?>" <?= ($filtros['apoderado_id']==$a['id'])?'selected':'' ?>><?= $a['nombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group mr-2">
    <select class="form-control" name="mes">
      <option value="">Mes</option>
      <?php for($m=1;$m<=12;$m++): ?>
      <option value="<?= $m ?>" <?= ($filtros['mes']==$m)?'selected':'' ?>><?= $m ?></option>
      <?php endfor; ?>
    </select>
  </div>
  <div class="form-group mr-2">
    <select class="form-control" name="estado">
      <option value="">Estado</option>
      <option value="pendiente" <?= ($filtros['estado']=='pendiente')?'selected':'' ?>>Pendiente</option>
      <option value="parcial" <?= ($filtros['estado']=='parcial')?'selected':'' ?>>Parcial</option>
      <option value="pagada" <?= ($filtros['estado']=='pagada')?'selected':'' ?>>Pagada</option>
    </select>
  </div>
  <button class="btn btn-primary">Filtrar</button>
</form>
<table class="table table-bordered">
<tr><th>ID</th><th>Apoderado</th><th>Mes</th><th>Año</th><th>Total</th><th>Pagado</th><th>Saldo</th><th>Estado</th><th>Acciones</th></tr>
<?php foreach($facturas as $f): ?>
<tr>
  <td><?= $f['id'] ?></td>
  <td><?= $f['apoderado'] ?></td>
  <td><?= $f['mes'] ?></td>
  <td><?= $f['año'] ?></td>
  <td><?= $f['monto_total'] ?></td>
  <td><?= $f['monto_pagado'] ?></td>
  <td><?= $f['saldo'] ?></td>
  <td><?= $f['estado'] ?></td>
  <td><a class="btn btn-sm btn-info" href="./?controller=facturas&action=show&id=<?= $f['id'] ?>">Ver</a></td>
</tr>
<?php endforeach; ?>
</table>
