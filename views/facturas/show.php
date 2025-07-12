<h2>Factura #<?= $factura['id'] ?></h2>
<table class="table table-bordered">
<tr><th>Apoderado</th><td><?= $factura['apoderado_id'] ?></td></tr>
<tr><th>Mes/Año</th><td><?= $factura['mes'] ?>/<?= $factura['año'] ?></td></tr>
<tr><th>Monto Total</th><td><?= $factura['monto_total'] ?></td></tr>
<tr><th>Monto Pagado</th><td><?= $factura['monto_pagado'] ?></td></tr>
<tr><th>Saldo</th><td><?= $factura['saldo'] ?></td></tr>
<tr><th>Estado</th><td><?= $factura['estado'] ?></td></tr>
</table>

<h4>Detalle por Entrenador</h4>
<table class="table table-bordered">
<tr><th>Entrenador</th><th>Monto Clases</th></tr>
<?php foreach($detalle as $d): ?>
<tr>
  <td><?= $d['coach'] ?></td>
  <td><?= $d['monto_clases'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<h4>Detalle por Deportista</h4>
<table class="table table-bordered">
<tr><th>Deportista</th><th>Coach</th><th>Monto Clases</th></tr>
<?php foreach($detalleDep as $d): ?>
<tr>
  <td><?= $d['deportista'] ?></td>
  <td><?= $d['coach'] ?></td>
  <td><?= $d['monto_clases'] ?></td>
</tr>
<?php endforeach; ?>
</table>
<h4>Registrar Pago</h4>
<form method="post" action="./?controller=facturas&action=registrarPago">
  <input type="hidden" name="factura_id" value="<?= $factura['id'] ?>">
  <div class="form-group">
    <input type="number" step="0.01" name="monto" class="form-control" placeholder="Monto" required>
  </div>
  <button class="btn btn-primary">Pagar</button>
</form>
<a href="./?controller=facturas" class="btn btn-secondary mt-2">Volver</a>
