<?php 

function getUserDetailsById($id) {
    $query = "select s.shopper_id as ShopperId, s.sh_username as username, s.sh_email as email, s.sh_phone as phone, s.sh_type as shopper_type, s.sh_shopgrp as shopper_group, ag.AG_name as role
    from Shopper s 
    inner join accessusergroup aug on aug.AUG_Shopper_id = s.shopper_id 
    inner join accessgroup ag on ag.AG_ID = AUG_AG_id
    where s.Shopper_id = ?;";
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