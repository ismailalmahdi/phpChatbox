<?php require_once 'core/init.php'; ?>
<?php 

// make this a function in the helpers.php and call it instead. 
// but before you do that make sure that the database connection has it own class!
// and the chat model has it own class as well.
// you should learn the best practice of development to make your coding life easier
// for you and for others trying to read your code.

	$chat->updateUserOnline($_SESSION['userid'], 0);
	$_SESSION['username'] = "";
	$_SESSION['userid']  = "";
	$_SESSION['login_details_id']= "";
	header("Location:index.php");
?>






