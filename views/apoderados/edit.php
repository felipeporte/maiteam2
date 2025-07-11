<h2>Editar Apoderado</h2>
<form method="post">
  <div class="form-group">
    <label>Nombre</label>
    <input class="form-control" name="nombre" value="<?= $apoderado['nombre'] ?>" required>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input class="form-control" name="email" type="email" value="<?= $apoderado['email'] ?>" required>
  </div>
  <div class="form-group">
    <label>Teléfono</label>
    <input class="form-control" name="telefono" value="<?= $apoderado['telefono'] ?>">
  </div>
  <button class="btn btn-primary">Actualizar</button>
</form>
