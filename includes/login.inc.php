<?php
	if(isset($_POST['login-submit']))
	{
		$username=$_POST['mailuid'];
		$pw=$_POST['pwd'];

		if(empty($username) || empty($pw))
		{
			header("Location: ../index.php?error=emptyfields");
			exit();

		}
		else{
			require "db.inc.php";

			$sql="SELECT * FROM users WHERE uid=?;";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param("s",$username);
			$stmt->execute();
			$result=$stmt->get_result();
			if(empty($result->num_rows))
			{
				header("Location: ../index.php?error=Nouserexists");
				exit();

			}
			else{
				$row=$result->fetch_assoc();
				$pwdcheck=password_verify($pw,$row['pwd']);
				if($pwdcheck==true)
				{
					session_start();
					$_SESSION['ID']=$row['id'];
					$_SESSION['UID']=$row['uid'];
					header("Location: ../index.php?login=success");
					exit();
				}
				else
				{
					header("Location: ../index.php?error=wrongpassword");
					exit();
				}
			}
		}


	}
	else{
		header("Location: ../index.php");
		exit();
	}
?>