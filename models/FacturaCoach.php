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
}
?>
