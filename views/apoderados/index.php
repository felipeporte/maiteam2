<h2>Apoderados</h2>
<a class="btn btn-primary mb-2" href="./?controller=apoderados&action=create">Nuevo Apoderado</a>
<table class="table table-bordered">
<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Acciones</th></tr>
<?php foreach($apoderados as $a): ?>
<tr>
  <td><?= $a['id'] ?></td>
  <td><?= $a['nombre'] ?></td>
  <td><?= $a['email'] ?></td>
  <td><?= $a['telefono'] ?></td>
  <td>
    <a class="btn btn-sm btn-warning" href="./?controller=apoderados&action=edit&id=<?= $a['id'] ?>">Editar</a>
    <a class="btn btn-sm btn-danger" href="./?controller=apoderados&action=delete&id=<?= $a['id'] ?>">Borrar</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
