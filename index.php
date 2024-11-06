<?php
session_start();  // Start the session to check session variables
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");  // Redirect to login page if the user is not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
    <script src="js/jquery.dataTables.min.js"></script> 
    <script src="js/dataTables.bootstrap.min.js"></script> 
    <script src="js/common.js"></script>
</head>
<body>
    <?php include('inc/container.php'); ?> <!-- Include header/container -->
    <div class="container">        
        <?php include("menus.php"); ?>   <!-- Include menus -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default rounded-0 shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                                <h3 class="card-title">Inventory</h3>
                            </div>                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table id="inventoryDetails" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>      
                                            <th>Product/Code</th>      
                                            <th>Starting Inventory</th> 
                                            <th>Inventory Received</th>                                     
                                            <th>Inventory Shipped</th>
                                            <th>Inventory on Hand</th>                                
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>  
    <?php include('inc/footer.php'); ?>  <!-- Include footer -->
</body>
</html>
