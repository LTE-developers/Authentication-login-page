<?php
// Initialize the session
session_start();

$data = 'data.txt';
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
header("location: welcome.php");
exit;
}



// Define variables and initialize with empty values
$mail = $password = "";
$check_mail_err = $check_password_err = "";
$empty_email_err=$empty_password_err='';
$invalid_err='';

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["signin"])){
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $empty_email_err = "Please enter mail.";
    } else{
        $mail = trim($_POST["email"]);
    }

// Check if password is empty
    if(empty(trim($_POST["password"]))){
        $empty_password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    $lines = file($data);
    $debug=[];
    foreach($lines as $line) {
            if($line==''){
               $a="";
            }
            else{
                $result= unserialize(base64_decode($line));
                array_push($debug,$result[4]);
//                if (in_array($_POST['email'],$result)){
                  if($result[4]==$_POST["email"]){

                    if(password_verify(trim($_POST["password"]), $result[3])){

                        if(empty($empty_mail_err) && empty($empty_password_err)){
                            // Password is correct, so start a new session
                            //session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $result[0];
                            $_SESSION["firstname"] = $result[1];
                            $_SESSION['lastname']= $result[2];
                            $_SESSION['mail']=$result[4];

                            // Redirect user to welcome page
                            header("location: welcome.php");
                            exit();
                        }
                        else{
                            $invalid_err='Something went wrong. Please try again';
                        }

                    }
                    else{
                        $check_password_err="Incorrect Password";
                    }
                }
                else{

                    $check_mail_err="Email does not exist";
                }
            }


    }

}

}
