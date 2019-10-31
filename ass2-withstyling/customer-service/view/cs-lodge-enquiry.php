<?php
require_once("../../application-context/session.php");
require_once("../../application-context/guards/userGuard.php");


$orderDetails = $_SESSION["orderDetails"];
$enqTypeList = $_SESSION["enqTypeList"];


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
    <div class="enquiry">
<h1>Lodge Enquiry</h1>
<form class="cf" action="../actions/enquiry/actSuccessEnquiry.php" method="POST">
  <div class="half left cf">
    <input class="form-control" type="text" id="orderId" name="orderId" value="Order ID: <?php echo $orderDetails[0]["Order_id"] ?>" readonly>
    <input class="form-control" type="text" id="input-name" placeholder="Name">
    <input class="form-control" type="email" id="input-email" placeholder="Email address">
    <select class="form-control" name="enqType">
                    <?php
                        foreach($enqTypeList as $enqType) {
                            ?> 
                            <option  value="<?php echo $enqType["EnqType_id"]?>"><?php echo $enqType["EnqType_name"]?></option>
                            <?php
                        }
                    ?>
    </select>
  </div>
  <div class="half right cf">
    <textarea class="form-control" name="message" type="text" id="input-message" placeholder="Message"></textarea>
  </div>  
  <input type="submit" value="Submit" id="enquiry-submit" class="btn btn-primary">
</form>
        </div>
    </div>
</div>
</body>

</html>

