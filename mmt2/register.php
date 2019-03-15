 <?php

include_once("includes/db.php");
            if(isset($_POST["register_btn"])){
                $user_name = $_POST["user_name"];
                $user_email = $_POST["user_email"];
                $user_password = $_POST["user_password"];
                $user_address = $_POST["user_address"];
                $user_contact = $_POST["user_contact"];
                $user_aadhar = $_POST["user_aadhar"];
                
                $hashed_password = password_hash($user_password, PASSWORD_DEFAULT); 
                
                $query = "INSERT INTO customer(user_name,user_email,user_password,user_address,user_contact,user_aadhar_no) VALUES('$user_name','$user_email','$hashed_password','$user_address',$user_contact,$user_aadhar)";
//                echo $query;
                $result = mysqli_query($connection,$query);
                if($result == 0){
                    header("Location: index.php?status=registerfailure");
                }
                else
                header("Location: index.php?status=registered");
            }
            ?>
    