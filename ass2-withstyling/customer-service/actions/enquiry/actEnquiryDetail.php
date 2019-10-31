

<?php
require_once "../../../application-context/session.php";
require_once "../../../application-context/guards/userGuard.php";

include "../../service/servEnquiry.php";

$id = $_GET["id"];
$enqDetails = fetchEnqByEnqId($id);
$_SESSION["enqDetails"] = $enqDetails;
header("Location: ../../view/cs-enquiry-details.php");
?>

