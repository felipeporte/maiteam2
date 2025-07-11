<?php
require_once 'Model.php';

class Factura extends Model {
    protected $table = 'facturas';

    public function allFiltered($filters = []) {
        $sql = "SELECT f.*, a.nombre AS apoderado FROM facturas f JOIN apoderados a ON f.apoderado_id = a.id WHERE 1=1";
        $params = [];
        if (!empty($filters['apoderado_id'])) { $sql .= " AND f.apoderado_id = ?"; $params[] = $filters['apoderado_id']; }
        if (!empty($filters['mes'])) { $sql .= " AND f.mes = ?"; $params[] = $filters['mes']; }
        if (!empty($filters['estado'])) { $sql .= " AND f.estado = ?"; $params[] = $filters['estado']; }
        $sql .= " ORDER BY f.año DESC, f.mes DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function generarMensualidad($mes, $año) {
        // Obtener costos de clases por apoderado
        $sql = "SELECT a.id apoderado_id, COALESCE(SUM(m.tarifa),0) monto_clases
                FROM apoderados a
                LEFT JOIN deportistas d ON d.apoderado_id=a.id
                LEFT JOIN inscripciones i ON i.deportista_id=d.id
                LEFT JOIN modalidades m ON m.id=i.modalidad_id
                GROUP BY a.id";
        $datos = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $fecha = date('Y-m-d');
        foreach ($datos as $row) {
            // verificar si ya existe factura
            $stmt = $this->db->prepare("SELECT id FROM facturas WHERE apoderado_id=? AND mes=? AND año=?");
            $stmt->execute([$row['apoderado_id'], $mes, $año]);
            if ($stmt->fetch()) { continue; }
            $stmt = $this->db->prepare("INSERT INTO facturas (apoderado_id, mes, año, monto_social, monto_clases, fecha_generacion) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$row['apoderado_id'], $mes, $año, 3000, $row['monto_clases'], $fecha]);
            $factura_id = $this->db->lastInsertId();

            // detalle por coach
            $detSql = "SELECT m.coach_id, SUM(m.tarifa) monto FROM deportistas d JOIN inscripciones i ON i.deportista_id=d.id JOIN modalidades m ON m.id=i.modalidad_id WHERE d.apoderado_id=? GROUP BY m.coach_id";
            $detStmt = $this->db->prepare($detSql);
            $detStmt->execute([$row['apoderado_id']]);
            foreach ($detStmt->fetchAll(PDO::FETCH_ASSOC) as $det) {
                $stmtDet = $this->db->prepare("INSERT INTO facturas_coach (factura_id, coach_id, monto_clases) VALUES (?,?,?)");
                $stmtDet->execute([$factura_id, $det['coach_id'], $det['monto']]);
            }
        }
    }

    public function registrarPago($factura_id, $monto) {
        $stmt = $this->db->prepare("UPDATE facturas SET monto_pagado = monto_pagado + ? WHERE id = ?");
        $stmt->execute([$monto, $factura_id]);
        $f = $this->find($factura_id);
        $estado = 'pendiente';
        if ($f['monto_pagado'] >= $f['monto_total']) {
            $estado = 'pagada';
        } elseif ($f['monto_pagado'] > 0) {
            $estado = 'parcial';
        }
        $stmt = $this->db->prepare("UPDATE facturas SET estado=? WHERE id=?");
        $stmt->execute([$estado, $factura_id]);
    }

    public function obtenerPendientes($apoderado_id = null) {
        $sql = "SELECT * FROM facturas WHERE saldo > 0";
        $params = [];
        if ($apoderado_id) { $sql .= " AND apoderado_id = ?"; $params[] = $apoderado_id; }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
