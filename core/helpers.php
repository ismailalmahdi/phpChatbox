<?php 

// checks if the user is logged in or not
// return true or false
function is_logged_in(){
	if(isset($_SESSION['userid']) && $_SESSION['userid']) { 
		return true;
	}
	return false;
}


// set an error message
// return null
function log_error_msg($msg=""){
	$_SESSION['error_msg'] = $msg;
}

// gets the error message the reset it.
// return error message (String)
function read_error_msg(){
	$msg = $_SESSION['error_msg']; // getting the message
	log_error_msg();
	return $msg; // returning the message
}



// add more helper functions that you can reuse in all your website
// Dont Repeat Yourself (DRY!!!) DRY coding



