<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','PerfectDay');

//application address
define('DIR','http://localhost.com/');
define('SITEEMAIL','aaron_escoto@aol.com');

try {

	//create PDO connection
	$db = new PDO("mysql:host=localhost;dbname=PerfectDay",                              
            "CreativeCoders", "DSBcT5A5NCdEBHtD");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
