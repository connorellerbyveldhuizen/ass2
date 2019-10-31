<?php

require_once("../application-context/session.php");


function check_credentials($username, $password) {
	$query  = "SELECT shopper_id, sh_password FROM Shopper ";
	$query .= "WHERE sh_username = ?";
	
	$dbo = dbConnect();
		
	$statement = $dbo->prepare($query);
	$statement->execute(array($username));

	$row = $statement->fetch();
	if ($row[0] > 0) {
		if (password_verify($password, $row[1]))
			return($row[0]);
	}
	else {
		return(0);
	}
}

function login($username, $password) {

	$shopper_id = check_credentials($username, $password);

	if ($shopper_id > 0) {
		session_regenerate_id(TRUE);

		$sessid = session_id();

		$dbo = dbConnect();

		$date = date('Y-m-d H:i:s');

		$query  = "INSERT INTO Session (id, Shopper_id, time) VALUES (?,?,?)";

		try {

			$statement = $dbo->prepare($query);
			$success = $statement->execute(array($sessid, $shopper_id, $date));
		}
		catch (PDOException $ex) {
			error_log($ex->getMessage());
			die($ex->getMessage());
		}
		return (TRUE);
	}
	else {
		return (FALSE);
	}
}

function logout() {
	
	session_regenerate_id(TRUE);
	session_destroy();
	// End the session;
}