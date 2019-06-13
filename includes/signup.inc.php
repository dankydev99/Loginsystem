<? php
if(isset($_POST['signup-submit'])){

	//require "db.inc.php";

	$username = $_POST['uid'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$pwdR = $_POST['pwd-repeat'];

	if(empty($username) || empty($email) || empty($pwd) || empty($pwdR)){
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&emailid=".$email);
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../signup.php?error=invalidemail&uid=".$username);
		exit();

	}

	else if(!preg_match("/^[[:alpha:]]*$/", $username)){
		header("Location: ../signup.php?error=invalidusername&emailid=".$email);
		exit();

	}

	else if($pwd!=$pwdR){
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&emailid=".$email);
		exit();
	}
	else{
		$dbServername="localhost";
		$dbUsername="root";
		$dbName="loginsystem";
		$dbPassword="";

		$conn=new mysqli($dbServername,$dbUsername,$dbPassword,$dbName);

		
		
		$sql = "SELECT id FROM users WHERE uid =?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$username);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows()>0){
			header("Location: ../signup.php?error=passwordcheck&emailid=".$email);
			exit();

		}
		else{
			$hashed_pwd=password_hash($pwd, PASSWORD_DEFAULT);
			$sql="INSERT INTO users (uid, email ,pwd) VALUES(?,?,?);";
			$stmt->bind_param("sss",$username,$email,$hashed_pwd);
			$stmt->execute();
			header("Location: ../signup.php?signup=success");

			exit();
			
		}



	}
	$stmt->close();
	$conn->close();

}


?>