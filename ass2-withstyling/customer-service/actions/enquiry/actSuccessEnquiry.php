

<?php
require_once "../../../application-context/session.php";
require_once "../../../application-context/guards/userGuard.php";

include "../../service/servEnquiry.php";

$enquiryFormData = $_POST;
$orderId = $enquiryFormData["orderId"];
$enqTitle = $enquiryFormData["title"];
$enqMsg = $enquiryFormData["message"];
$enqTypeId = $enquiryFormData["enqType"];

//Validation

$enquiry = newCustomerEnquiry($orderId, $enqTitle, $enqMsg, $enqTypeId);


header("Location: ../../view/cs-success-enquiry.php");
?>