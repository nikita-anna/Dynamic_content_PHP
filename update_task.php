<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT status FROM tasks WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $task = mysqli_fetch_assoc($result);

    if ($task) {
        $new_status = $task['status'] === 'completed' ? 'pending' : 'completed';
        $update_sql = "UPDATE tasks SET status = ? WHERE id = ?";
        $update_stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($update_stmt, "si", $new_status, $id);
        mysqli_stmt_execute($update_stmt);
        mysqli_stmt_close($update_stmt);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
header("Location: index.php");
exit;
?>
