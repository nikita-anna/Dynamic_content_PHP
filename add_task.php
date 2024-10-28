<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['task_name'])) {
    $task_name = $_POST['task_name'];
    $sql = "INSERT INTO tasks (task_name) VALUES (?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $task_name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
header("Location: index.php");
exit;
?>
