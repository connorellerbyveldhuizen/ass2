<?php require_once("../../application-context/guards/userGuard.php"); ?>

<h3>Enquiries:</h3>
    <table class="table table-hover">
    <th>Enquiry ID</th>
    <th>Order ID</th>
    <th>Title</th>
    <th>Created date</th>
    <th>Status</th>
    <th colspan="2">Actions</th>
        <?php

            foreach ($enquiryList as $enquiry) {
        ?>
        <tr>
            <td>
            <?php
                echo $enquiry["enquiry_id"];
            ?>
            </td>
            <td>
            <?php
                echo $enquiry["Enq_Order_id"];
            ?>
            </td>
            <td>
            <?php
                echo $enquiry["Enq_enquiry_title"];
            ?>
            </td>
            <td>
            <?php
                echo $enquiry["Enq_created_date"];
            ?>
            </td>
            <td>
            <?php
                echo $enquiry["status"];
            ?>
            </td>
            <td>
                <a href="../actions/order/actOrderDetail.php?id=<?php echo $enquiry["Enq_Order_id"]?>">View Order</a>
            </td>
            <td>
                <a href="../actions/enquiry/actEnquiryDetail.php?id=<?php echo $enquiry["enquiry_id"]?>">View Enquiry</a>
            </td>
        </tr>
        <?php
            }
        ?>