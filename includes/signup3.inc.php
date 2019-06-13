<?php
    if(isset($_POST['signup-submit']))
    {   
        $emailId=$_POST['email'];
        $username=$_POST['uid'];
        $password=$_POST['pwd'];
        $passwordR=$_POST['pwd-repeat'];
        if(empty($emailId) || empty($username) || empty($password) || empty($passwordR) )
        {
            header("Location: ../signup.php?error=emptyfields");
            exit();
        }

        elseif (!filter_var($emailId, FILTER_VALIDATE_EMAIL))
        {
            header("Location: ../signup.php?error=invalidemail&uid=".$username);
            exit(); 
        }
        elseif (!preg_match('/^[a-zA-Z]+[a-zA-Z0-9]*$/',$username)) 
        {
            header("Location: ../signup.php?error=invalidusername&email=".$emailId);
            exit(); 
            
        }
      
        
        elseif ($password!==$passwordR) {
            header("Location: ../signup.php?error=passwordmatcherror&email=".$emailId."&uid=".$username);
            exit(); 
        }

        else
        {
            require "db.inc.php";
             $sql="SELECT * FROM users WHERE uid=? ;";

            $stmt=$conn->prepare($sql);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows()>0){
                header("Location: ../signup.php?error=usernameALREADYexists&email=".$emailId);
                exit(); 

            }

            else{
                $passwordHashed=password_hash($password, PASSWORD_DEFAULT);
                $sql="INSERT INTO users(uid,email,pwd) VALUES(?,?,?);";

                $stmt=$conn->prepare($sql);
                $stmt->bind_param("sss",$username,$emailId,$passwordHashed);
                $stmt->execute();

                $conn->close();

                header("Location: ../signup.php?signup=success");
                exit();
            }

        }

    }

    else{
        header("Location: ../signup.php");
        exit();
    }

?>