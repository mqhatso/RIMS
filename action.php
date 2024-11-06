<<?php
session_start();  // Start the session to manage session variables

// Logout Action
if (!empty($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();  // Unset session variables
    session_destroy();  // Destroy the session
    header("Location:index.php");  // Redirect to index page (or login page)
    exit;  // Ensure no further code is executed
}

// Include the Inventory class and initialize it
include 'Inventory.php';
$inventory = new Inventory();

// Inventory Management
if (!empty($_POST['action']) && $_POST['action'] == 'getInventoryDetails') {
    $inventory->getInventoryDetails();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addInventory') {
    $inventory->addInventory();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'getInventory') {
    $inventory->getInventory();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'updateInventory') {
    $inventory->updateInventory();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteInventory') {
    $inventory->deleteInventory();
}

// Financial System Management
if (!empty($_POST['action']) && $_POST['action'] == 'financialList') {
    $inventory->getFinancialList();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addFinancialRecord') {
    $inventory->addFinancialRecord();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'updateFinancialRecord') {
    $inventory->updateFinancialRecord();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteFinancialRecord') {
    $inventory->deleteFinancialRecord();
}

// POS System
if (!empty($_POST['action']) && $_POST['action'] == 'posList') {
    $inventory->getPosList();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addPosTransaction') {
    $inventory->addPosTransaction();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'getPosTransaction') {
    $inventory->getPosTransaction();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deletePosTransaction') {
    $inventory->deletePosTransaction();
}

// Supplier Management
if (!empty($_POST['action']) && $_POST['action'] == 'supplierList') {
    $inventory->getSupplierList();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addSupplier') {
    $inventory->addSupplier();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'updateSupplier') {
    $inventory->updateSupplier();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteSupplier') {
    $inventory->deleteSupplier();
}

// Spoilage Management
if (!empty($_POST['action']) && $_POST['action'] == 'spoilageList') {
    $inventory->getSpoilageList();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addSpoilage') {
    $inventory->addSpoilage();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteSpoilage') {
    $inventory->deleteSpoilage();
}

// Restocking Management
if (!empty($_POST['action']) && $_POST['action'] == 'restockingList') {
    $inventory->getRestockingList();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addRestocking') {
    $inventory->addRestocking();
}

// Restaurant Manager Management
if (!empty($_POST['action']) && $_POST['action'] == 'managerList') {
    $inventory->getManagerList();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addManager') {
    $inventory->addManager();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'updateManager') {
    $inventory->updateManager();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteManager') {
    $inventory->deleteManager();
}

// Kitchen Staff Management
if (!empty($_POST['action']) && $_POST['action'] == 'kitchenStaffList') {
    $inventory->getKitchenStaffList();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'addKitchenStaff') {
    $inventory->addKitchenStaff();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'updateKitchenStaff') {
    $inventory->updateKitchenStaff();
}
if (!empty($_POST['btn_action']) && $_POST['btn_action'] == 'deleteKitchenStaff') {
    $inventory->deleteKitchenStaff();
}
?>
