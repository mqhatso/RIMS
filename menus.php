<nav class="navbar navbar-dark bg-dark bg-gradient navbar-expand-lg navbar-expand-md my-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav menus">
                <li class="nav-item"><a class="nav-link" href="index.php" id="index_menu">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="inventory.php" id="inventory_menu">Inventory</a></li>
                <li class="nav-item"><a class="nav-link" href="kitchen_staff.php" id="kitchen_staff_menu">Kitchen Staff</a></li>
                <li class="nav-item"><a class="nav-link" href="restocking.php" id="restocking_menu">Restocking</a></li>
                <li class="nav-item"><a class="nav-link" href="supplier.php" id="supplier_menu">Supplier</a></li>
                <li class="nav-item"><a class="nav-link" href="spoilage.php" id="spoilage_menu">Spoilage</a></li>
                <li class="nav-item"><a class="nav-link" href="financial_system.php" id="financial_system_menu">Financial System</a></li>
                <li class="nav-item"><a class="nav-link" href="restaurant_manager.php" id="restaurant_manager_menu">Restaurant Manager</a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown position-relative">
                <button type="button" class="badge bg-light border px-3 text-dark rounded-pill dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="badge badge-pill bg-danger count"></span> 
                    <?php echo $_SESSION['name']; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="action.php?action=logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
