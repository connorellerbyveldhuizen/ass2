<?php require_once("../../application-context/guards/userGuard.php");?>


<h3>Orders:</h3>
    <table class="table table-hover">
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Date Paid</th>
        <th>Order Total</th>
        <th>Shipping Status</th>
        <th>Ship Date</th>
        <th colspan="2">Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php

            foreach ($orders as $order) {
        ?>
        <tr>
            <td>
            <?php
                echo $order["Order_id"];
            ?>
            </td>
            <td>
            <?php
                echo $order["Order_TimeStamp"];
            ?>
            </td>
            <td>
            <?php
                echo $order["Order_PayDate"];
            ?>
            </td>
            <td>
            <?php
                echo $order["Order_Total"];
            ?>
            </td>
            <td>
            <?php
                echo $order["Order_Shipped"] != 0 ? "SHIPPED" : "IN TRANSIT" ;
            ?>
            </td>
            <td>
            <?php
                echo $order["Order_ShipDate"];
            ?>
            </td>
            <td>
                <a href="../actions/order/actOrderDetail.php?id=<?php echo $order["Order_id"]?>">View Order</a>
            </td>
            <?php 
            if ($principle['role'] != 'CSR') {
                ?> 
            <td>
                <a href="../actions/enquiry/actLodgeEnquiry?id=<?php echo $order["Order_id"]?>">Make Enquiry</a>
            </td>
                <?php
            }
            ?>
        </tr>
    </tbody>

        <?php
            }
        ?>