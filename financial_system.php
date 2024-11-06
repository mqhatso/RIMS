<?php
ob_start();
session_start();
include 'inc/header.php';
include 'inc/container.php';
require 'db_connection.php';

$table_name = 'financial_system';

// Handle adding and deleting transactions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $date = $_POST['transaction_date'];
        $amount = $_POST['amount'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        
        $query = "INSERT INTO $table_name (transaction_date, amount, type, description)
                  VALUES ('$date', '$amount', '$type', '$description')";
        mysqli_query($conn, $query);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM $table_name WHERE id = $id";
        mysqli_query($conn, $query);
    }
}

// Fetch records
$result = mysqli_query($conn, "SELECT * FROM $table_name");

?>

<h2>Manage Financial Transactions</h2>

<!-- Form to Add New Record -->
<form method="post">
    <input type="date" name="transaction_date" required>
    <input type="number" step="0.01" name="amount" placeholder="Amount" required>
    <select name="type">
        <option value="income">Income</option>
        <option value="expense">Expense</option>
    </select>
    <input type="text" name="description" placeholder="Description">
    <button type="submit" name="add">Add Transaction</button>
</form>

<!-- Display Records -->
<table border="1">
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Type</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['transaction_date']; ?></td>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['description']; ?></td>
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
