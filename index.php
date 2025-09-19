<?php
$page = $_GET['page'] ?? 'login';

switch($page) {
    case 'register':
        require_once 'controllers/AuthController.php';
        $auth = new AuthController();
        $auth->register();
        break;
    case 'login':
        require_once 'controllers/AuthController.php';
        $auth = new AuthController();
        $auth->login();
        break;
    case 'logout':
        require_once 'controllers/AuthController.php';
        $auth = new AuthController();
        $auth->logout();
        break;
    case 'dashboard':
        require_once 'controllers/TaskController.php';
        $task = new TaskController();
        $task->dashboard();
        break;
    case 'task_add':
        require_once 'controllers/TaskController.php';
        $task = new TaskController();
        $task->add();
        break;
    case 'task_edit':
        require_once 'controllers/TaskController.php';
        $task = new TaskController();
        $task->edit();
        break;
    case 'task_delete':
        require_once 'controllers/TaskController.php';
        $task = new TaskController();
        $task->delete();
        break;
    default:
        echo "Página não encontrada!";
}
