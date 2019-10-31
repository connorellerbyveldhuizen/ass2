<?php
require_once "../../../application-context/guards/userGuard.php";

function CreateEnquiry($orderId, $enqTitle, $enqStatusId, $enqTypeId, $enqMessage)
{
    $dbo = dbconnect();
    $nowDate = date("Y-m-d");
    $query = "INSERT INTO Enquiries
    (Enq_Order_id, Enq_enq_type_id, Enq_enq_status_id, Enq_enquiry_title,
    Enq_enquiry_message, Enq_created_date, Enq_updated_date)
    VALUES (?, ?, ?, ?, ?, ?,?)";

    $dbo = dbconnect();

    try {
        $statement = $dbo->prepare($query);
        $success = $statement->execute(array($orderId, $enqTypeId, $enqStatusId, $enqTitle, $enqMessage, $nowDate, $nowDate));
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }

    return (true);
}

function getAllEnqByShopperId($shopperId)
{
    $dbo = dbconnect();
    $query = "SELECT e.enquiry_id, e.Enq_Order_id, e.Enq_enquiry_title, e.Enq_enquiry_message, e.Enq_created_date, es.EnqStatus_name AS status FROM enquiries e INNER JOIN store3.order o ON e.Enq_Order_id = o.Order_id INNER JOIN enqstatus es on
    es.EnqStatus_id = e.Enq_enq_status_id where o.Order_Shopper  = ?";

    $dbo = dbconnect();
    $statement = $dbo->prepare($query);

    $statement->execute(array($shopperId));
    try {
        $rows = $statement->fetchAll();
        return $rows;
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

function getEnqByEnqId($enqId) {
    $dbo = dbconnect();
    $query = "SELECT * FROM enquiries WHERE enquiry_id = ?";

    $statement = $dbo->prepare($query);

    $statement->execute(array($enqId));
    try {
        $rows = $statement->fetchAll();
        return $rows;
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}


function countAllEnqByShopperId($shopperId)
{
    $dbo = dbconnect();
    $query = "SELECT count(*) as enq_amount FROM enquiries e INNER JOIN store3.order o ON e.Enq_Order_id = o.Order_id WHERE o.Order_Shopper = ?";

    $dbo = dbconnect();
    $statement = $dbo->prepare($query);

    $statement->execute(array($shopperId));
    try {
        $row = $statement->fetch();
        return $row;
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

function getAllEnqStatus()
{
    $dbo = dbconnect();
    $query = "SELECT * FROM EnqStatus";

    $statement = $dbo->prepare($query);
    $statement->execute();

    try {
        $rows = $statement->fetchAll();
        return $rows;
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

function getAllEnqType()
{
    $dbo = dbconnect();
    $query = "SELECT * FROM EnqType";

    $statement = $dbo->prepare($query);
    $statement->execute();

    try {
        $rows = $statement->fetchAll();
        return $rows;
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

function getAllEnquiries() {

    $dbo = dbconnect();
    $query = "SELECT e.enquiry_id, e.Enq_Order_id, e.Enq_enquiry_title, e.Enq_enquiry_message, e.Enq_created_date, es.EnqStatus_name AS status FROM enquiries e INNER JOIN store3.order o ON e.Enq_Order_id = o.Order_id INNER JOIN enqstatus es on
    es.EnqStatus_id = e.Enq_enq_status_id";

    $statement = $dbo->prepare($query);
    $statement->execute();

    try {
        $rows = $statement->fetchAll();
        return $rows;
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

