

<?php
require_once "../../../application-context/session.php";
require_once "../../../application-context/guards/userGuard.php";

include "../../service/servOrder.php";

$id = $_GET["id"];
$orderDetails = fetchOrderDetailsById($id);
$_SESSION["orderDetails"] = $orderDetails;
header("Location: ../../view/cs-order-detail.php");
?>

