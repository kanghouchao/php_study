<?php
require_once 'config.php';

// 新規タスクの追加処理
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task = trim($_POST['task']);
    if (!empty($task)) {
        $stmt = $conn->prepare("INSERT INTO tasks (task, created_at) VALUES (?, NOW())");
        $stmt->execute([$task]);
    }
}

// タスクの削除処理
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
}

// すべてのタスクの取得
$stmt = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タスクリスト</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">タスクリスト</h1>
        
        <!-- 新規タスク追加フォーム -->
        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="task" class="form-control" placeholder="新しいタスクを追加..." required>
                <button type="submit" class="btn btn-primary">追加</button>
            </div>
        </form>

        <!-- タスクリスト -->
        <div class="list-group">
            <?php foreach ($tasks as $task): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?php echo htmlspecialchars($task['task']); ?></span>
                    <div>
                        <small class="text-muted me-3"><?php echo date('Y-m-d H:i', strtotime($task['created_at'])); ?></small>
                        <a href="?delete=<?php echo $task['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('このタスクを削除してもよろしいですか？')">削除</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 