<?php
require_once "../../application-context/session.php";
require_once "../../application-context/guards/userGuard.php";

$enqDetails = $_SESSION["enqDetails"];
?>

<html>

<head>
    <title>Enquiry Detail</title>
</head>

<body>
    <?php include 'partials/nav.php' ?>

    <div><a href="../../les-session-management/LogoutShopper.php">Logout</a></div>


    <div class="shipping-info">
        <p>Enquiry ID: <?php echo $enqDetails[0]["enquiry_id"] ?></p>
        <p>Enquiry Order Id : <?php echo $enqDetails[0]["Enq_Order_id"] ?></p>
        <p>Enquiry title: <?php echo $enqDetails[0]["Enq_enquiry_title"] ?></p>
        <p>Enquiry Message: <?php echo $enqDetails[0]["Enq_enquiry_message"] ?></p>
        <p>Enquiry title: <?php echo $enqDetails[0]["Enq_created_date"] ?></p>
        <div class="enquiry-order" style="border: 1px solid black; display: inline-block; padding: 8px;">
            <a href="../actions/order/actOrderDetail.php?id=<?php echo $enqDetails[0]["Enq_Order_id"] ?>">View Order</a>
        </div>

    </div>

</body>

</html>