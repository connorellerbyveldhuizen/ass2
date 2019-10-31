<?php 
include("../../DAL/dalShopper.php");

function getCurrentUser($id) {

    $principle = $_SESSION['principle'];

    if(!isset($_SESSION['principle'])) {
        throw Exception("You are not currently logged in");
    }
    $currentUser = getUserDetailsById($id);
    return $currentUser;
}

?>