

<?php

require_once "../../../application-context/session.php";
require_once "../../../application-context/guards/userGuard.php";

include "../../service/servOrder.php";
include "../../service/servEnquiry.php";

$id = $_GET["id"];
$orderDetails = fetchOrderDetailsById($id);
$enqTypeList = fetchAllEnqTypes();

$_SESSION["orderDetails"] = $orderDetails;
$_SESSION["enqTypeList"] = $enqTypeList;

header("Location: ../../view/cs-lodge-enquiry.php");
?>