<?php
    require_once "conn.php";
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if($email != "" && $password != "" && $username != ""){
        $sql = "INSERT INTO users (`email`, `username`, `password`) VALUES ('$email', '$username', $password)";
            if (mysqli_query($conn, $sql)) {
                header("location: login.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
    }





?>
