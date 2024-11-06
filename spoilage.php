<?php
ob_start();
session_start();
include 'inc/header.php';
include 'inc/container.php';
require 'db_connection.php';

$table_name = 'spoilage';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];
        $spoilage_date = $_POST['spoilage_date'];

        $stmt = $conn->prepare("INSERT INTO $table_name (item_id, quantity, spoilage_date) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $item_id, $quantity, $spoilage_date);
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

<h2>Manage Spoilage</h2>

<form method="post">
    <input type="number" name="item_id" placeholder="Item ID" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="date" name="spoilage_date" required>
    <button type="submit" name="add">Add Spoilage</button>
</form>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Item ID</th>
        <th>Quantity</th>
        <th>Spoilage Date</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['item_id']); ?></td>
        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
        <td><?php echo htmlspecialchars($row['spoilage_date']); ?></td>
        <td>
            <form method="post" style="display
