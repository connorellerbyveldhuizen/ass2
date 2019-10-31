<?php

include "../../DAL/dalEnquiry.php";

function newCustomerEnquiry($orderId, $enqTitle, $enqMsg, $enqTypeId)
{
    $enqStatusId = 1; //OPEN
    $lodgeSuccess = CreateEnquiry($orderId, $enqTitle, $enqStatusId, $enqTypeId, $enqMsg);
    return $lodgeSuccess;
}

function fetchAllEnqStatus()
{
    $EnqStatusList = getAllEnqStatus();
    return $EnqStatusList;
}

function fetchAllEnqTypes()
{
    $EnqTypeList = getAllEnqType();
    return $EnqTypeList;
}

function fetchNoOfEnq($shopperId)
{
    return countAllEnqByShopperId($shopperId);
}

function fetchAllEnquiriesByShopperId($shopperId) {

    return getAllEnqByShopperId($shopperId);
} 

function fetchAllEnquiries() {
    return getAllEnquiries();
}

function fetchEnqByEnqId($enqId) {

    return getEnqByEnqId($enqId);
}

?>