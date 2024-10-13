<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, task, status FROM todos WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h2>Your To-Do List</h2>
    <a href="logout.php">Logout</a>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo htmlspecialchars($row['task']); ?>
                - <?php echo $row['status'] ? 'Done' : 'Pending'; ?>
                <form action="update_task.php" method="POST" style="display:inline;">
                    <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                    <?php if ($row['status']): ?>
                        <button type="submit" name="action" value="undone">Mark as Undone</button>
                    <?php else: ?>
                        <button type="submit" name="action" value="done">Mark as Done</button>
                    <?php endif; ?>
                </form>
                <form action="delete_task.php" method="POST" style="display:inline;">
                    <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Remove</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
    <form action="add_task.php" method="POST">
        <label for="task">New Task:</label>
        <input type="text" id="task" name="task" required>
        <button type="submit">Add Task</button>
    </form>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
