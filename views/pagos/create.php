<h2>Registrar Pago</h2>
<form method="post">
  <div class="form-group">
    <label>Apoderado</label>
    <select class="form-control" name="apoderado_id">
      <?php foreach($apoderados as $a): ?>
      <option value="<?= $a['id'] ?>"><?= $a['nombre'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Tipo</label>
    <select class="form-control" name="tipo">
      <option value="cuota_social">Cuota Social</option>
      <option value="clases">Clases</option>
    </select>
  </div>
  <div class="form-group">
    <label>Monto</label>
    <input class="form-control" name="monto" type="number" step="0.01" required>
  </div>
  <div class="form-group">
    <label>Fecha</label>
    <input class="form-control" name="fecha" type="date" required>
  </div>
  <button class="btn btn-primary">Guardar</button>
</form>
