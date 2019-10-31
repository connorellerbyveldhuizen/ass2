<?php

require_once("../../application-context/session.php");
require_once("../../application-context/guards/userGuard.php");

$principle = $_SESSION["principle"];

if (isset($_SESSION["orders"])) {
    $orders = $_SESSION["orders"];
}



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
        <div class="col-lg-8" id="dashboard-header">
        <h1>Welcome <?php echo $principle['username'] ?> to Customer Service <?php echo $principle['role'] == 'CSR' ? '[Admin]' : "" ?></h1>
        </div>
<div class="col-lg-4" id="dashboard-search">
            <form class="form-inline" action="../actions/dashboard/actDashboard.php" method="get">
            <label for="orderId">Order Id:</label>
            <input type="text" name="orderId" value="" />
            <button type="submit">Go!</button>
            </form>
</div>
</div>
<div class="row">

    <div class="col-lg-2"></div>
<div class="col-lg-8" >
    <?php
    if (isset($orders)) {
        include('partials/orderList.php');
    };    

    ?>
</div>
<div class="col-lg-2">
</div>
</div>
<div class=row>
    <div class="enqbox">
        <?php include('partials/enqbox.php') ?>
    </div>
</div>
</div>
</body>

</html>