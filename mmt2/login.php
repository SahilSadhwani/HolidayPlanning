<?php

include_once("includes/db.php");
session_start();

    if(isset($_POST["login_btn"])){
        $user_email = $_POST["user_email"];
        $user_password = $_POST["user_password"];
        
        $cleaned_username = mysqli_real_escape_string($connection, htmlentities($user_email));
            
        $query = "SELECT * FROM customer WHERE user_email = '$cleaned_username'";
        $result = mysqli_query($connection,$query);
//        echo $result;
        $ans = mysqli_num_rows(mysqli_query($connection, $query));
        
        if(mysqli_num_rows(mysqli_query($connection, $query))>1){
            die("acc more than 1");
        }
        if($ans>0 && $ans<=1){
    
            $row = mysqli_fetch_assoc($result);
            $password = $row["user_password"];
    
//echo  $password;  
if(password_verify($user_password,$password)){
//        if($user_password == $password){
            $_SESSION["user_id"] = $row["user_id"];
            
        
        header("Location: index.php?user_id={$row["user_id"]}");
        
            
        }
        else{
            $_SESSION["Login_process"] = "loginfailure";
        header("Location: index.php?status=loginfailure");
//            die("error");
    }
            
//        header("Location :index.php");
}
    else{
        $_SESSION["Login_process"] = "loginfailure";
        header("Location: index.php?status=loginfailure");
//        die("Invalid username or password");
    }
    }
    ?>