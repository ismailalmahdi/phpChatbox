
<?php require_once 'core/init.php'; ?>

<?php 

	// you should add this to the helpers.php and call it instead!
	// again make sure you have the chat model is sapreated from the database connection!!! 
	
	//$loginError = ''; // check the helpers error handler

	if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
		
		$user = $chat->loginUsers($_POST['username'], $_POST['pwd']);

		if(!empty($user)) {
			$_SESSION['username'] = $user[0]['username'];
			$_SESSION['userid'] = $user[0]['userid'];
			$chat->updateUserOnline($user[0]['userid'], 1);
			$lastInsertId = $chat->insertUserLoginDetails($user[0]['userid']);
			$_SESSION['login_details_id'] = $lastInsertId;
			header("Location:index.php");
		} else {
			// instead to having the error to be in a variable 
			// it is better to make the error messages to be the seasons!
			// so you can access from anywhere in the website
			// then once you display it you can clear it
			// $loginError = "Invalid username or password!"; 
			// check the helpers.php for error handling 
			$_SESSION['error_msg'] = "Invalid username or password!";
		}
	}else{
		header("Location:index.php");
	}
?>

<!-- I had to fix the html bugs you should not add the login form here  -->
<!-- only the action of the login -->







