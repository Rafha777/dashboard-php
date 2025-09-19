<?php
require_once __DIR__ . '/../models/Task.php';
session_start();

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function dashboard() {
        $tasks = $this->taskModel->getAll($_SESSION['user_id']);
        include __DIR__ . '/../views/dashboard.php';
    }

    public function add() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->taskModel->add($_SESSION['user_id'], $_POST['title'], $_POST['description']);
            header('Location: index.php?page=dashboard');
        }
        include __DIR__ . '/../views/task_add.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $task = $this->taskModel->getById($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->taskModel->update($id, $_POST['title'], $_POST['description'], $_POST['status']);
            header('Location: index.php?page=dashboard');
        }
        include __DIR__ . '/../views/task_edit.php';
    }

    public function delete() {
        $id = $_GET['id'];
        $this->taskModel->delete($id);
        header('Location: index.php?page=dashboard');
    }
}

