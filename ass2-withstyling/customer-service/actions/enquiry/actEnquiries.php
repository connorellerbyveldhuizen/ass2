

<?php

require_once "../../../application-context/session.php";
require_once "../../../application-context/guards/userGuard.php";

include "../../service/servOrder.php";
include "../../service/servEnquiry.php";

$id = $_SESSION["principle"]["ShopperId"];
$enquiryList = fetchAllEnquiriesByShopperId($id);

if($_SESSION["principle"]["role"] == 'CSR') {
    $enquiryList = fetchAllEnquiries();
}

$_SESSION["enquiryList"] = $enquiryList;

header("Location: ../../view/cs-enquiries.php");
?>