<?php
include_once("Database.php");
class queryClass
{

	private $db;
	function __construct()
	{
		global $Database;
		$this->db 		=	&$Database	;
		
	}

	function emailcheck($email)
	{
		$stmt 	=$this->db->prepare("Select Last_Name from users where (Email = :email)");
			$stmt->execute(array(':email'=>$email));
			if($stmt->rowCount()!=0)
			{
				return $stmt->fetch()['Last_Name'];
			}
			else 
			{
				return "err";
			}


	}
	function updatepass($email, $password)
	{
		$stmt 	=$this->db->prepare("Update users set Password = :password where (Email = :email)");
			if($stmt->execute(array(':email'=>$email, ':password'=>$password)))
			{
				return "Updated Password";
			}
			
			else 
			{
				return "err";
			}


	}
	function oldpasscheck($email,$pass)
	{
		$stmt 	=$this->db->prepare("Select Password from users where (Email = :email)");
			$stmt->execute(array(':email'=>$email));
			$p=$stmt->fetch()['Password'];
			if($p==$pass)
			{

				return "Password Match" ;
			}
			
			else 
			{
				return "err";
			}
	}
	function matchPassword($password,$confirm_password)
	{
		if($password==$confirm_password && strlen($password)>3)
		{
				return "no error";
		}
		else 
		{
			return "err";		
		}

	}
	function SavingPictures($email,$img)
	{
		$a='';
		$stmt 	=$this->db->prepare("Select Photo from users where (Email = :email)");
		
	
			$stmt->execute(array(':email'=>$email)); 
			$a=$stmt->fetch()['Photo'];
			if($a==NULL)
			{
			//echo " hi      ";
			$a='';
			//var_dump($a);
			}
		
		
		$stmt 	=$this->db->prepare("Update users set Photo = :photo where (Email = :email)");
		$img=$a." ".$img;
			//echo " hello      ";
				//var_dump($img);
			if($stmt->execute(array(':email'=>$email, ':photo'=>$img)))
			{	
				return "Updated Image\t ";

			}
			
			else 
			{
				return "err";
			}

	}
	function FileUpload($email,$file)
	{
		$stmt=$this->db->prepare("Update users set File=:file where (Email = :email)");
		if ($stmt->execute(array (':email' => $email,':file' => $file)))
		{
			return "File Updatation Done"; 
		} 
		else 
		{
			return "err";
		}
	}

	function ShowFile($email)
	{
		$stmt 	=$this->db->prepare("Select File from users where (Email = :email)");
		$stmt->execute(array(':email'=>$email)); 
			$a=$stmt->fetch()['File'];
			return $a;

		
	}
	function checkfile($filetype)
	{
		$filetypearray=array("text/plain","application/octet-stream");
		if(in_array($filetype, $filetypearray))
		{
			return "Alright  \t ";

		}
		else
		{
			return "err";
		}

	}
	function ConvertToXLS()
	{
		$stmt=$this->db->prepare("SELECT * FROM users");
		$stmt->setFetchMode(PDO::FETCH_NUM);
		$stmt->execute();
		
		$ar=array();

		while($r=$stmt->fetch()){
			array_push($ar,$r);
		}

		$file=fopen("../res/database.xls","w");

	for ($col=0;$col<count($ar);$col++)
	{
	for($row=0;$row<count($ar[$col]);$row++)
	{ 	
		fwrite($file,@$ar[$col][$row]);
		fwrite($file,"\t");
	
	}
	fwrite($file,"\n");
	}
	var_dump($file); 
	fclose($file);
	return $file;
	
		

	}
	function insertTable($arr)
	{
		//var_dump($arr[0]);
		$stmt=$this->db->prepare("INSERT INTO people (name, marks, field, hobbies) values ('$arr[0]','$arr[1]','$arr[2]','$arr[3]')");
		if($stmt->execute())
		{
			return "Inserted";
		}
		else 
		{
			return "Not Inserted";
		}

	}
	function fetchall()
	{

		$stmt=$this->db->prepare("Select * from people");
		$stmt->setFetchMode(PDO::FETCH_NUM);
		$stmt->execute();
		
		$ar=array();

		while($r=$stmt->fetch()){
			array_push($ar,$r);
		}
		echo "<br>";
		//var_dump($ar);
		echo "<br>";
		return $ar;

		

		

	}
	function update($arr,$id)
	{
		$id=(int)$id;
	
		$stmt=$this->db->prepare("UPDATE people SET name = :name , marks = :marks, field = :field, hobbies = :hobbies WHERE id = :id");
		if($stmt->execute(array(":name" => $arr[0], ":marks" => $arr[1], ":field" => $arr[2],  ":hobbies" => $arr[3], ":id" => $id  )))
		{
			return "Updated";
		}
		else 
		{
			return "err";
		}
	}
	function getUserDetails($User)
	{
		$db = new Database(); 
		$User=$User."%";
		$stmt 	=$this->db->prepare("SELECT * from users WHERE Username LIKE :user");
			$stmt->execute(array(':user'=>$User));
			$stmt->setFetchMode(PDO::FETCH_NUM);
			$ar=array();

			while($r=$stmt->fetch()){
			array_push($ar,$r);
			}
			return $ar;


	}
	function getAll($User)
	{
		$db = new Database(); 
		$User=$User."%";
		$stmt 	=$this->db->prepare("SELECT * from users WHERE Username LIKE :user");
			$stmt->execute(array(':user'=>$User));
			
		
			return $stmt;


	}
	function PDFGenerator($file)
	{	
		
	

}}
?>