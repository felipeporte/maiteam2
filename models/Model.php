<?php
require_once __DIR__ . '/../config/database.php';

abstract class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $fields = array_keys($data);
        $values = array_values($data);
        $placeholders = implode(',', array_fill(0, count($fields), '?'));
        $fieldList = implode(',', $fields);
        $stmt = $this->db->prepare("INSERT INTO {$this->table} ($fieldList) VALUES ($placeholders)");
        $stmt->execute($values);
        return $this->db->lastInsertId();
    }

    public function update($id, $data) {
        $fields = [];
        foreach ($data as $key => $val) {
            $fields[] = "$key = ?";
        }
        $fieldList = implode(',', $fields);
        $values = array_values($data);
        $values[] = $id;
        $stmt = $this->db->prepare("UPDATE {$this->table} SET $fieldList WHERE id = ?");
        return $stmt->execute($values);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
