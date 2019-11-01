<?php
require_once("../../application-context/session.php");
require_once("../../application-context/guards/userGuard.php");

$principle = $_SESSION["principle"];
?>

<html>

<head>
    <title>Order Detail</title>
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
    <div class="col-lg-8" id="success-enquiry">
    <h3>Your enquiry has been lodged :)</h3>
    <div class="success">
        <p>A Customer Representive will reply to you shortly through email.</p>

    </div>
    </div>
    </div>
</div>
</body>

</html>