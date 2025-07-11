<h2>Editar Deportista</h2>
<form method="post">
  <div class="form-group">
    <label>Apoderado</label>
    <select class="form-control" name="apoderado_id">
      <?php foreach($apoderados as $a): ?>
      <option value="<?= $a['id'] ?>" <?= $a['id']==$deportista['apoderado_id']?'selected':'' ?>><?= $a['nombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Nombre</label>
    <input class="form-control" name="nombre" value="<?= $deportista['nombre'] ?>" required>
  </div>
  <div class="form-group">
    <label>Edad</label>
    <input class="form-control" name="edad" type="number" value="<?= $deportista['edad'] ?>">
  </div>
  <button class="btn btn-primary">Actualizar</button>
</form>
