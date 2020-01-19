<?php 


require_once 'db.php';
require_once 'chat.php';
require_once 'helpers.php';

// starting sessions 
SESSION_START();

// this should only run once 
$db = new database();

// init chat model
$chat = new chat($db);

