<?php
namespace App\Controllers;

use App\Models\Task;
use PDO;

class TaskController
{
    private $task;

    public function __construct(PDO $db)
    {
        $this->task = new Task($db);
    }

    public function index()
    {
        $stmt = $this->task->read();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        include __DIR__ . '/../../views/tasks/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task'])) {
            $this->task->task = $_POST['task'];
            
            if ($this->task->create()) {
                header('Location: /');
                exit;
            }
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $this->task->id = $id;
            
            if ($this->task->delete()) {
                http_response_code(200);
                echo json_encode(['message' => 'タスクが削除されました。']);
            } else {
                http_response_code(503);
                echo json_encode(['message' => 'タスクの削除に失敗しました。']);
            }
        }
    }
} 