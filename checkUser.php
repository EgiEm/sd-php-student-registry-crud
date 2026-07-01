<?php
session_start(); // Start the session
require_once('conn.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0 ){
        $_SESSION['username'] = $username; // Store username in session
        header("location: index.php");
    } else {
        echo "User  not found!";
    }  
}
?>