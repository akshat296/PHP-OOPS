<?php 

class Database extends PDO
{
	function __construct()
	{
		try{
		parent::__construct("mysql:host=localhost;dbname=USERS_INFO","root","",array(PDO::ATTR_PERSISTENT=>true,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	}
	catch(PDOException $e)
	{
		die("Database servers is not responding");
	}
}
}