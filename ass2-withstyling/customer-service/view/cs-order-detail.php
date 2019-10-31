<?php
require_once("../../application-context/session.php");
require_once("../../application-context/guards/userGuard.php");


$orderDetails = $_SESSION["orderDetails"];
?>

<html>

<head>
    <title>Customer Service Dashboard</title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- load bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- load main stylesheet -->
    <link rel="stylesheet" type="text/css" media="screen" href="/ass2/customer-service/resources/static/main.css">
</head>

<body>
<div class="container" id="mainblock">
    <?php include('partials/nav.php') ?>
    <div class="row">
        <div class="col-lg-12">
        <h2>Order : <?php echo $orderDetails[0]["Order_id"]?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

    <div class="shipping-info">
            <p>Order Cost : $<?php echo $orderDetails[0]["Order_ProductAmount"]?></p>
            <p>GST : $<?php echo $orderDetails[0]["Order_TaxAmount"]?></p>
            <p>Shipping Cost : $<?php echo $orderDetails[0]["Order_ShippingAmount"]?></p>
            <p>Shipping Status : <?php echo $orderDetails[0]["Order_Shipped"] != 0 ? "SHIPPED" : "IN TRANSIT"?></p>
            <p>Shipping Date : <?php echo $orderDetails[0]["Order_Shipped"] != 0 ? $orderDetails[0]["Order_ShipDate"] : "-"?></p>        
        </div>        
    <table class="table table-hover">
    <thead>
    <tr>
        <th>Item List</th>
        <th>SKU</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
        <?php

            foreach ($orderDetails as $productInOrder) { 
        ?>
        <tr>
            <td>
            <?php
                echo $productInOrder["prod_name"];
            ?>
            </td>
            <td>
            <?php
                echo $productInOrder["prod_sku"];
            ?>
            </td>
            <td>
            <?php
                echo $productInOrder["PrPr_Price"];
            ?>
            </td>
        </tr>
    </tbody>
    <?php }; ?>

    </div>
    </div>
    </div>
</div>
</body>

</html>

