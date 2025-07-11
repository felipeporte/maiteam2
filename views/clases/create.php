<h2>Nueva Inscripción</h2>
<form method="post">
  <div class="form-group">
    <label>Deportista</label>
    <select class="form-control" name="deportista_id">
      <?php foreach($deportistas as $d): ?>
      <option value="<?= $d['id'] ?>"><?= $d['nombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Modalidad</label>
    <select class="form-control" name="modalidad_id">
      <?php foreach($modalidades as $m): ?>
      <option value="<?= $m['id'] ?>"><?= $m['nombre'] ?> - $<?= $m['tarifa'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <button class="btn btn-primary">Guardar</button>
</form>
