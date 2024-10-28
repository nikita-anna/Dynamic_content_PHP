<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
</head>
<body>
    <h1>To-Do List</h1>
    <form action="add_task.php" method="post">
        <input type="text" name="task_name" required placeholder="Enter new task">
        <button type="submit">Add Task</button>
    </form>
    
    <ul>
        <?php
        $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);

        while ($task = mysqli_fetch_assoc($result)):
        ?>
            <li>
                <span style="text-decoration: <?php echo $task['status'] == 'completed' ? 'line-through' : 'none'; ?>">
                    <?php echo htmlspecialchars($task['task_name']); ?>
                </span>
                <form action="update_task.php" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <button type="submit"><?php echo $task['status'] == 'completed' ? 'Undo' : 'Complete'; ?></button>
                </form>
                <form action="delete_task.php" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>

    <?php mysqli_close($conn); ?>
</body>
</html>
