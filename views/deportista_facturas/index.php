<h2>Deudas por Deportista</h2>
<table class="table table-bordered">
<tr><th>Deportista</th><th>Coach</th><th>Monto Total</th><th>Acciones</th></tr>
<?php foreach($totales as $t): ?>
<tr>
  <td><?= $t['nombre'] ?></td>
  <td><?= $t['coach'] ?></td>
  <td><?= $t['total'] ?></td>
  <td><a class="btn btn-sm btn-info" href="./?controller=deportistafacturas&action=show&id=<?= $t['id'] ?>">Detalle</a></td>
</tr>
<?php endforeach; ?>
</table>
