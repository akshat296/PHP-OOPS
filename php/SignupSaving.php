<?php 
spl_autoload_register(function($class)
{
	include_once("$class.php");
});
session_start();
if(isset($_POST['submit']))
{
	$fn       		   = $_POST['first_name']		;
	$ln       		   = $_POST['last_name']		;
	$usrname           = $_POST['username']			;
	$email             = $_POST['email']			;
	$password 		   = $_POST['password']			;
	$confirm_password  = $_POST['confirm_password']	;
}
$Database 	 =new Database();
$err;
$SignUpObj	 =new SignUp($fn, $ln, $usrname, $email,$password,$confirm_password);
$SignUpObj->saving();

//variables 
class SignUp
{

//$file	  		   =
	private $fn       		   ;
	private $ln       		   ;
	private $usrname           ; 
	private $email             ; 
	private $password 		   ;  
	private $confirm_password  ;
	private $gender            ;
	private $company           ; 
	private $add1              ; 
	private $add2              ;
	private $city              ;
	private $zip               ;
	private $mobile            ;
	private $dob               ;
	private $interest          ; 
	private $description       ;
	private $condition         ; 
	private $db                ;
function __construct(
$fn                 ,       		   
$ln       		    ,
$usrname            ,
$email              ,
$password 		    , 
$confirm_password   )
{
	global $Database;	
	$this->db               =&$Database			;
	$this->fn   			=$fn 				;
	$this->ln 				=$ln 				;
	$this->usrname  		=$usrname 			;
	$this->email            =$email 			; 
	$this->password 		=$password 			;
	$this->confirm_password =$confirm_password	;
}


function saving()
{

$Validations	= new SignUpValidations(
$this->fn,
$this->ln,
$this->usrname,
$this->email,
$this->password,
$this->confirm_password);
$this->usrname=$Validations->username($this->usrname);
//var_dump($this->usrname);
if($this->usrname!="err")
{
$this->password =md5($this->password);
$stmt=$this->db->prepare("INSERT INTO users(
	First_Name,
	Last_Name,
	Username,
	Email,
	Password) VALUES (
	:first_name,
	:last_name,
	:username,
	:email,
	:password)");
if ($stmt->execute(array(
	':first_name'=>$this->fn,
	':last_name' =>$this->ln,
	':username'  =>$this->usrname,
	':email'     =>$this->email,
	':password'  =>$this->password)))
{
	echo "saved";
}
else 
{
	echo "not saved";
}
}
}
}
?>