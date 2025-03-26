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
        <form method="POST" action="/tasks" class="mb-4">
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
                        <button class="btn btn-danger btn-sm delete-task" data-id="<?php echo $task['id']; ?>">削除</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.delete-task').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('このタスクを削除してもよろしいですか？')) {
                    const id = this.dataset.id;
                    fetch(`/tasks/${id}`, {
                        method: 'DELETE'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html> 