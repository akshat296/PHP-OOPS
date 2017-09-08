<?php 
spl_autoload_register(function ($class)
{
include_once("$class.php");
});


@session_start();

class SignUpValidations
{
	
	
	private $fn       		   ;
	private $ln       		   ;
	private $usrname           ; 
	private $email             ; 
	private $password 		   ;  
	private $confirm_password  ;
	private $db;
	private $err;
	function __construct(
			$fn                 ,       		   
			$ln       		    ,
			$usrname            ,
			$email              ,
			$password 		    , 
			$confirm_password   )
	{
	global $Database;	
	global $err;
	$this->db               =&$Database;
	$this->err              =&$err;
	$this->fn   			=$fn;
	$this->ln 				=$ln;
	$this->usrname  		=$usrname;
	$this->email            =$email; 
	$this->password 		=$password;
	$this->confirm_password =$confirm_password;
	}
	
	function username($username)
	{
		if(strlen($username)>3)
		{
			$stmt 	=$this->db->prepare("Select Username from users where Username=:username");
			$stmt->execute(array(':username'=>$username));
			if($stmt->rowcount()!=1)
			{
				return $username;
			}
			else 
			{
				$err["username"]="Username Not Available";
				return "err";
			}

		}
		else 
		{ 	
			$err["username"]="Username Should be greater than 3 characters";
			return "err";
		}

			
	}
	function email($email)
	{
		
		
	}
	function password($password, $confirm_password)
	{
	 	if($password==$confirm_password && strlen($password)>3)
	 	{
	 		return $password;
	 	}	
	 	else 
	 	{
	 		return "err";
	 	}
		
	}
	function text($text)
	{
		
		
	}
	function dateOfBirth($file)
	{
		
		
	}
	function mobileNumber($file)
	{
		
		
	}
	function file($file)
	{
		
		
	}
}


?>