<?php 

include("../../DAL/dalOrder.php");

function fetchAllOrders() {
    return getAllOrders();
}

function fetchAllOrdersByShopperId($id) {

    $orders = getOrdersByShopperId($id);
    return $orders;
}

function fetchAllOrdersByShopperIdAndOrderId($orderId, $shopperId) {
    return getOrderByShopperIdAndOrderId($orderId, $shopperId);
}

function fetchOrderDetailsById($id) {
    $orderDetails = getOrderWithProductById($id);
    return $orderDetails;
}

function fetchAllOrderByOrderId($orderId) {
    return getOrderByOrderId($orderId);
}


?>