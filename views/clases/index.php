<h2>Inscripciones</h2>
<a class="btn btn-primary mb-2" href="/?controller=clases&action=create">Nueva Inscripción</a>
<table class="table table-bordered">
<tr><th>ID</th><th>Deportista</th><th>Modalidad</th><th>Acciones</th></tr>
<?php foreach($inscripciones as $i): ?>
<tr>
  <td><?= $i['id'] ?></td>
  <td><?= $i['deportista_id'] ?></td>
  <td><?= $i['modalidad_id'] ?></td>
  <td>
    <a class="btn btn-sm btn-danger" href="/?controller=clases&action=delete&id=<?= $i['id'] ?>">Borrar</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
