

<?php
require_once "../../../application-context/session.php";
require_once "../../../application-context/guards/userGuard.php";

include "../../service/servOrder.php";
include "../../service/servShopper.php";
include "../../service/servEnquiry.php";

$principle = $_SESSION['principle'];
$user = getCurrentUser($principle["ShopperId"])[0];

$orders;

if (isset($_GET['orderId'])) {

    $orderId = $_GET['orderId'];

    if ($user['role'] == 'CSR') {
        $orders = fetchAllOrderByOrderId($orderId);
        if ($orderId == null) {
            $orders = fetchAllOrders();
        }
    } else if ($user['role'] != 'CSR') {
        $orders = fetchAllOrdersByShopperIdAndOrderId($orderId, $user["ShopperId"]);
        if ($orderId == null) {
            $orders = fetchAllOrdersByShopperId($user["ShopperId"]);
        }

    }
    ;
} else {
    if ($user['role'] == 'CSR') {
        $orders = fetchAllOrders();
    } else if ($user['role'] != 'CSR') {
        $orders = fetchAllOrdersByShopperId($principle["ShopperId"]);
    }
    ;
}

$enqAmount = fetchNoOfEnq($principle["ShopperId"]);


$_SESSION["principle"] = $user;

$_SESSION["orders"] = $orders;

$_SESSION["EnqAmount"] = ($enqAmount['enq_amount'] > 0 ? $enqAmount : "-");

session_write_close();
header("Location: ../../view/cs-dashboard.php");
?>