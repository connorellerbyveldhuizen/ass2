<?php 
require_once "../../../application-context/guards/userGuard.php";

function getAllOrders() {
    $query = "SELECT * FROM store3.order";
    $dbo = dbconnect();
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

function getOrdersByShopperId($id) {
    $dbo = dbconnect();
    $query = "SELECT * FROM store3.order WHERE Order_Shopper = ?";
    
    $dbo = dbconnect();
    $statement = $dbo->prepare($query);

    $statement->execute(array($id));
    try {
        $rows = $statement->fetchAll();
        return $rows;    
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

function getOrderByOrderId($id) {
    $dbo = dbconnect();
    $query = "SELECT * FROM store3.order WHERE Order_Id = ?";
    
    $dbo = dbconnect();
    $statement = $dbo->prepare($query);

    $statement->execute(array($id));
    try {
        $rows = $statement->fetchAll();
        return $rows;    
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

function getOrderByShopperIdAndOrderId($orderId, $shopperId) {
    $dbo = dbconnect();
    $query = "SELECT * FROM store3.order WHERE Order_id = ? AND Order_Shopper = ?";
    
    $statement = $dbo->prepare($query);

    $statement->execute(array($orderId, $shopperId));
    try {
        $rows = $statement->fetchAll();
        return $rows;    
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

function getOrderWithProductById($id) {
    $dbo = dbconnect();
    $query = "SELECT o.*,p.*,pr.*
    FROM store3.Order o
    INNER JOIN orderproduct op
    ON o.Order_id = op.OP_order_id 
    INNER JOIN product p
    ON p.prod_id = op.OP_prod_id
    INNER JOIN prodprices pr ON
    pr.PrPr_Prod_id = p.prod_id
    WHERE o.Order_id = ?";

    $dbo = dbconnect();
    $statement = $dbo->prepare($query);

    $statement->execute(array($id));

    try {
        $rows = $statement->fetchAll();
        return $rows;    
    } catch (PDOException $ex) {
        error_log($ex->getMessage());
        die($ex->getMessage());
    }
}

?>