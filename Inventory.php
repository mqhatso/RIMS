<?php
ob_start();
session_start();
include 'inc/header.php';
include 'inc/container.php';
require 'db_connection.php';
class Inventory {
    private $conn; // Database connection

    public function __construct($db) {
        $this->conn = $db; // Initialize with the database connection
    }
    
    public function checkLogin() {
        // Check if the user is logged in, redirect to login page if not
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            header("Location: login.php");
            exit;
        }
    }

    // Additional methods can go here
}
    // If logged in, check if the user is on a specific page and redirect accordingly
    $currentPage = basename($_SERVER['PHP_SELF']); // Get the current page name

    // Define a list of pages to check for specific handling
    $allowedPages = ['index.php', 'restaurant_manager.php', 'kitchen_staff.php', 'spoilage.php', 
                     'supplier.php', 'pos_system.php', 'financial_system.php', 'restocking.php', 'action.php'];

    // If the current page is not in the allowed list, redirect accordingly
    if (!in_array($currentPage, $allowedPages)) {
        // Redirect to a default page or show an error
        header("Location: index.php"); // You can change this to the appropriate page
        exit;
    }
// Handling form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add a new item
    if (isset($_POST['add'])) {
        $item_name = $_POST['item_name'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
        $unit_price = $_POST['unit_price'];
        $supplier_id = $_POST['supplier_id'];

        // Insert into the inventory table
        $query = "INSERT INTO inventory (item_name, category, quantity, unit_price, supplier_id)
                  VALUES ('$item_name', '$category', '$quantity', '$unit_price', '$supplier_id')";
        if (mysqli_query($conn, $query)) {
            echo "Item added successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    
    // Delete an item
    elseif (isset($_POST['delete'])) {
        $item_id = $_POST['item_id'];
        $query = "DELETE FROM inventory WHERE item_id = $item_id";
        if (mysqli_query($conn, $query)) {
            echo "Item deleted successfully.";
        } else {
            echo "Error deleting item: " . mysqli_error($conn);
        }
    }
}

// Fetch and display inventory items
$result = mysqli_query($conn, "SELECT * FROM inventory");

if ($result) {
    echo "<table>";
    echo "<tr><th>Item ID</th><th>Item Name</th><th>Category</th><th>Quantity</th><th>Unit Price</th><th>Supplier ID</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['item_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
        echo "<td>" . htmlspecialchars($row['unit_price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['supplier_id']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error fetching inventory: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>


<h2>Manage Inventory</h2>

<form method="post">
    <input type="text" name="item_name" placeholder="Item Name" required>
    <input type="text" name="category" placeholder="Category">
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="number" step="0.01" name="unit_price" placeholder="Unit Price">
    <input type="number" name="supplier_id" placeholder="Supplier ID">
    <button type="submit" name="add">Add Item</button>
</form>

<table border="1">
    <tr>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Supplier ID</th>
        <th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['item_id']; ?></td>
        <td><?php echo $row['item_name']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?php echo $row['unit_price']; ?></td>
        <td><?php echo $row['supplier_id']; ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="delete">Delete</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include 'inc/footer.php';

?>