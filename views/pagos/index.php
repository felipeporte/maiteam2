<h2>Pagos</h2>
<a class="btn btn-primary mb-2" href="./?controller=pagos&action=create">Registrar Pago</a>
<table class="table table-bordered">
<tr><th>ID</th><th>Apoderado</th><th>Tipo</th><th>Monto</th><th>Fecha</th><th>Acciones</th></tr>
<?php foreach($pagos as $p): ?>
<tr>
  <td><?= $p['id'] ?></td>
  <td><?= $p['apoderado_id'] ?></td>
  <td><?= $p['tipo'] ?></td>
  <td><?= $p['monto'] ?></td>
  <td><?= $p['fecha'] ?></td>
  <td>
    <a class="btn btn-sm btn-danger" href="./?controller=pagos&action=delete&id=<?= $p['id'] ?>">Borrar</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
