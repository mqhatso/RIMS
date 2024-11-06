<?php
include 'inc/header.php';
include 'inc/container.php';
require 'db_connection.php';

$table_name = 'pos_system';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $terminal_name = $_POST['terminal_name'];
        $location = $_POST['location'];

        $stmt = $conn->prepare("INSERT INTO $table_name (terminal_name, location) VALUES (?, ?)");
        $stmt->bind_param("ss", $terminal_name, $location);
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

<h2>Manage POS System</h2>

<form method="post">
    <input type="text" name="terminal_name" placeholder="Terminal Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <button type="submit" name="add">Add Terminal</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Terminal Name</th>
        <th>Location</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['terminal_name']); ?></td>
        <td><?php echo htmlspecialchars($row['location']); ?></td>
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
