<h2>Deportistas</h2>
<a class="btn btn-primary mb-2" href="/?controller=deportistas&action=create">Nuevo Deportista</a>
<table class="table table-bordered">
<tr><th>ID</th><th>Apoderado</th><th>Nombre</th><th>Edad</th><th>Acciones</th></tr>
<?php foreach($deportistas as $d): ?>
<tr>
  <td><?= $d['id'] ?></td>
  <td><?= $d['apoderado_id'] ?></td>
  <td><?= $d['nombre'] ?></td>
  <td><?= $d['edad'] ?></td>
  <td>
    <a class="btn btn-sm btn-warning" href="/?controller=deportistas&action=edit&id=<?= $d['id'] ?>">Editar</a>
    <a class="btn btn-sm btn-danger" href="/?controller=deportistas&action=delete&id=<?= $d['id'] ?>">Borrar</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
