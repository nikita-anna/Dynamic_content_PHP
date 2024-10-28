<?php
include 'config.php';

$user_id = $_GET['user_id'] ?? 1;

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($user['name']); ?>'s Profile</h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <img src="<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" width="150" height="150">
</body>
</html>
<?php
else:
    echo "User not found.";
endif;

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
