<?php
ob_start();
session_start();
include 'inc/header.php';
include 'inc/container.php';
require 'db_connection.php';

$table_name = 'restaurant_manager';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $manager_name = $_POST['manager_name'];
        $contact_info = $_POST['contact_info'];

        $stmt = $conn->prepare("INSERT INTO $table_name (manager_name, contact_info) VALUES (?, ?)");
        $stmt->bind_param("ss", $manager_name, $contact_info);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM $table_name WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

$result = mysqli_query($conn, "SELECT * FROM $table_name");

?>

<h2>Manage Restaurant Managers</h2>

<form method="post">
    <input type="text" name="manager_name" placeholder="Manager Name" required>
    <input type="text" name="contact_info" placeholder="Contact Info" required>
    <button type="submit" name="add">Add Manager</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Manager Name</th>
        <th>Contact Info</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['manager_name']); ?></td>
        <td><?php echo htmlspecialchars($row['contact_info']); ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="delete">Delete</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include 'inc/footer.php'; ?>
