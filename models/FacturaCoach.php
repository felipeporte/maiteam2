<?php
require_once 'Model.php';

class FacturaCoach extends Model {
    protected $table = 'facturas_coach';

    public function porFactura($factura_id) {
        $sql = "SELECT fc.*, c.nombre AS coach FROM facturas_coach fc JOIN coaches c ON fc.coach_id = c.id WHERE fc.factura_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$factura_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalesPorCoach() {
        $sql = "SELECT c.id, c.nombre, SUM(fc.monto_clases) AS total FROM facturas_coach fc JOIN coaches c ON fc.coach_id=c.id GROUP BY c.id";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function porCoach($coach_id) {
        $sql = "SELECT fc.*, f.mes, f.año, a.nombre AS apoderado FROM facturas_coach fc JOIN facturas f ON fc.factura_id=f.id JOIN apoderados a ON f.apoderado_id=a.id WHERE fc.coach_id=? ORDER BY f.año DESC, f.mes DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$coach_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
