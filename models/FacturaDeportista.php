<?php
require_once 'Model.php';

class FacturaDeportista extends Model {
    protected $table = 'facturas_deportista';

    public function porFactura($factura_id) {
        $sql = "SELECT fd.*, d.nombre AS deportista, c.nombre AS coach FROM facturas_deportista fd JOIN deportistas d ON fd.deportista_id=d.id JOIN coaches c ON fd.coach_id=c.id WHERE fd.factura_id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$factura_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalesPorDeportista() {
        $sql = "SELECT d.id, d.nombre, c.nombre AS coach, SUM(fd.monto_clases) AS total FROM facturas_deportista fd JOIN deportistas d ON fd.deportista_id=d.id JOIN coaches c ON fd.coach_id=c.id GROUP BY d.id, c.id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function porDeportista($deportista_id) {
        $sql = "SELECT fd.*, f.mes, f.año, c.nombre AS coach, a.nombre AS apoderado FROM facturas_deportista fd JOIN facturas f ON fd.factura_id=f.id JOIN coaches c ON fd.coach_id=c.id JOIN deportistas d ON fd.deportista_id=d.id JOIN apoderados a ON d.apoderado_id=a.id WHERE fd.deportista_id=? ORDER BY f.año DESC, f.mes DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$deportista_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
