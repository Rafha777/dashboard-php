<?php
require_once __DIR__ . '/../core/Database.php';

class Task {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($user_id, $title, $description) {
        $stmt = $this->db->prepare("INSERT INTO tasks (user_id, title, description) VALUES (?, ?, ?)");
        return $stmt->execute([$user_id, $title, $description]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $description, $status) {
        $stmt = $this->db->prepare("UPDATE tasks SET title = ?, description = ?, status = ? WHERE id = ?");
        return $stmt->execute([$title, $description, $status, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$id]);
    }
}

