<?php
    if(isset($_POST['signup-submit'])){
        $emailId=$_POST['email'];
        $username=$_POST['uid'];
        $password=$_POST['pwd'];
        $passwordR=$_POST['pwd-repeat'];

        require "db.inc.php";


        $sql="INSERT INTO users(uid,email,pwd) VALUES('".$username."','".$emailId."','".$password."');";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
         else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        header("Location: ../index.php?signup=success");
    

    }

?>