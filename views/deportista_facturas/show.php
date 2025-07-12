<h2>Detalle de Facturas del Deportista</h2>
<table class="table table-bordered">
<tr><th>Apoderado</th><th>Coach</th><th>Mes</th><th>Año</th><th>Monto Clases</th></tr>
<?php foreach($detalle as $d): ?>
<tr>
  <td><?= $d['apoderado'] ?></td>
  <td><?= $d['coach'] ?></td>
  <td><?= $d['mes'] ?></td>
  <td><?= $d['año'] ?></td>
  <td><?= $d['monto_clases'] ?></td>
</tr>
<?php endforeach; ?>
</table>
<a href="./?controller=deportistafacturas" class="btn btn-secondary">Volver</a>
