<?php

require_once("./config.php");
require_once("../application-context/session.php");
require_once("./login.php");


// $password = "test";
// echo password_hash($password, PASSWORD_BCRYPT);

if(isset($_SESSION['principle'])) {
    header('Location: /ass2/customer-service/view/cs-dashboard.php');

}

// Where to go next
if (isset($_GET['continue'])) {
	$continue = $_GET['continue'];
}
else {
	if (isset($_POST['continue'])) {
		$continue = $_POST['continue'];
	}
	else {
		$continue = "../customer-service/actions/dashboard/actDashboard.php";
	}
}

if(isset($_POST['stage']) && ($_POST['stage'] == 'process')) {
	process_form();
} else {
	print_form($continue, "Please enter your account details:");
}

function process_form() {
	global $continue;
	if(login($_POST['username'], $_POST['password'])) {
		$shopperId = store_get_shopper_id();
		$principle = [
			"ShopperId" => $shopperId
		];
		$_SESSION['principle'] = $principle;
		session_write_close();
		header("Location: $continue");
	}
	else {
		print_form($continue, "Invalid credentials");
	}
}

function print_form($continue, $error) {
	global $store_name, $slogan;
	$title = $store_name . " - " . "Shopper Login";
	?>
<html>
<head>
<title><?= $store_name ?> - Shopper Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- load bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- load main stylesheet -->
<link rel="stylesheet" type="text/css" media="screen" href="/ass2/customer-service/resources/static/main.css">
</head>
<header>
</header>
<body>
  <div class="container" id="mainblock">
    <div class="row">
    	<div class="col-lg-3"></div>
      <div class="col-lg-6 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" id="login" method="post" onsubmit="return validateFormOnSubmit(this)" action="LoginShopper.php">
            	<input type="hidden" name = "continue" value = "<?= $continue ?>" />
				<input type="hidden" name = "stage" value = "process" />
				<a class="small" href="#"><?php echo $error ?></a>
              <div class="form-label-group">
                <input name="username" type="username" id="username" class="form-control" placeholder="Email address" required autofocus>
                <label for="username">Username</label>
              </div>

              <div class="form-label-group">
                <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Log In" name="submit">Sign in</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>
</body>
<footer>
</footer>
</html>
<?php
}

?>