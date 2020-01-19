<?php require_once 'config.php'; ?>
<?php 
	
/**
* Database class to connect to the database 
*/
class database {
	private $dbConnect = false; 

	public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli(DB_HOST,DB_USER, DB_PWD, DB_NAME);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }

    public function connection(){
    	return $this->dbConnect;
    }
}