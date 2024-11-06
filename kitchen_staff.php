<?php
ob_start();
session_start();
include 'inc/header.php';
include 'inc/container.php';
require 'db_connection.php';

$table_name = 'kitchen_staff';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $staff_name = $_POST['staff_name'];
        $position = $_POST['position'];
        $salary = $_POST['salary'];
        
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO $table_name (staff_name, position, salary) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $staff_name, $position, $salary);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM $table_name WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}

$result = mysqli_query($conn, "SELECT * FROM $table_name");

?>

<h2>Manage Kitchen Staff</h2>

<form method="post">
    <input type="text" name="staff_name" placeholder="Staff Name" required>
    <input type="text" name="position" placeholder="Position" required>
    <input type="number" name="salary" placeholder="Salary" required>
    <button type="submit" name="add">Add Staff</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Staff Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['staff_name']); ?></td>
        <td><?php echo htmlspecialchars($row['position']); ?></td>
        <td><?php echo htmlspecialchars($row['salary']); ?></td>
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
