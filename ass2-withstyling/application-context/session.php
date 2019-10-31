<?php

	require("config/dbconnect.php");
	
	function store_get_shopper_id() {
		# Get a database connection
		global $store_session_con;
		if (!isset($store_session_con)) {
			$store_session_con = dbConnect();
		}
		// First, get the shopper_id from the Session table
		$query  = "SELECT Shopper_id FROM Session ";
		$query .= "WHERE id = ?";

		try {
			$statement = $store_session_con->prepare($query);
			
			$statement->execute(array(session_id()));
		}
		catch (PDOException $ex) {
			error_log("PDO Exception in file $ex->getFile(), line $ex->getLine(): Code $ex->getCode() - $ex->getMessage()");
			return(0);
		}
		if ($statement->rowCount() > 0) {
			$row = $statement->fetch(PDO::FETCH_NUM);
			return($row[0]);
		}
		else {
			return false;
		}
	}

	function store_session_open($save_path, $sess_name) {
		global $store_session_con;
		
		$store_session_con = dbConnect();
		return (TRUE);
	}
	
	function store_session_close() {
		global $store_session_con;
		
		$store_session_con = null;
	}
	
	function store_session_read($session_id) {
		global $store_session_con;
		
		$query = "SELECT data FROM Session WHERE id = ?";
		try {
			$statement = $store_session_con->prepare($query);
			$statement->execute(array($session_id));
		}
		catch (PDOException $ex) {
			die($ex->getMessage());
		}
		
		if($statement->rowCount() == 1) {
			$row = $statement->fetch();
			return($row[0]);
		}
		return (FALSE);
	}
	
	function store_session_write($session_id, $session_data){
		global $store_session_con;
		if (!isset($store_session_con)) {
			$store_session_con = dbConnect();
		}
		// First, see if that session already exists
		$query = "SELECT COUNT(*) FROM Session WHERE id = ?";
		try {
			$statement = $store_session_con->prepare($query);
			$statement->execute(array($session_id));
		} catch (PDOException $ex) {
			die($ex->getMessage());
		}
		$row = $statement->fetch();
		if ($row[0] > 0)
			$query = "UPDATE Session SET id = ?, data = ?";
		else
			$query = "REPLACE Session (id, data) VALUES (?,?)";
		try {
			$statement = $store_session_con->prepare($query);
			$statement->execute(array($session_id, $session_data));
		}
		catch(PDOException $ex) {
			die($ex->getMessage());
		}
		return(TRUE);
	}
	
	function store_session_destroy($session_id){
		global $store_session_con;
		if (!isset($store_session_con)) {
			$store_session_con = dbConnect();
		}
		$query = "DELETE FROM Session WHERE id = ?";
		try {
			$statement = $store_session_con->prepare($query);
			$statement->execute(array($session_id));
		}
		catch(PDOException $ex) {
			die($ex->getMessage());
		}
		
	}
	
	function store_session_gc($gc_maxlife){
		global $store_session_con;
		if (!isset($store_session_con)) {
			$store_session_con = dbConnect();
		}
		// Following statement may be MySQL-specific - check syntax for Oracle, etc.
		$query = "DELETE FROM Session WHERE t < NOW() - INTERVAL ? SECOND";
		try {
			$statement = $store_session_con->prepare($query);
			$statement->execute($gc_maxlife);
		}
		catch(PDOException $ex) {
			die($ex->getMessage());
		}
		return (TRUE);
	}
	
	// ini_set("session.save_handler", "user");
	
	session_set_save_handler(
		"store_session_open",
		"store_session_close",
		"store_session_read",
		"store_session_write",
		"store_session_destroy",
		"store_session_gc"
	);
	
	session_start();

	?>