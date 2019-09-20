<?php

$lastname_err = $password = $confirm_password = $firstname_err="";
$username_err = $password_err = $confirm_password_err = "";
$firstname=$lastname="";
$mail_err=$mail="";
$data = 'data.txt';
$password_harshed="";
$general_err='';

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['signup'])){
        // Validate username
        if (empty(trim($_POST["firstname"]))) {
            $firstname_err = "Please enter a firstname.";
        } else if(empty(trim($_POST["lastname"]))){
            $lastname_err = "Please enter a lastname.";
        }
        else{
            $firstname=trim($_POST["firstname"]);
            $lastname=trim($_POST["lastname"]);
        }

        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have atleast 6 characters.";
        } else {

            $password = trim($_POST["password"]);
            $password_harshed = password_hash($password, PASSWORD_DEFAULT);
        }

        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

        //validate Email
        if(empty(trim($_POST["email"]))){
            $mail_err="Email cannot be empty";
        }

        $lines = file($data);
        foreach($lines as $line) {
                if($line==''){
                    continue;
                }
                else{
                    $result= unserialize(base64_decode($line));
                    if ($result[4]==$_POST['email']){

                        $mail_err="Email already exist";

                        break;
                    }
                    else{
                        $mail=$_POST['email'];
                    }
                }

        }



        // Check input errors before inserting in file
        if (empty($firstname_err) && empty($mail_err) && empty($lastname_err) && empty($password_err) && empty($confirm_password_err)) {
            $id=0;
            foreach($lines as $line) {
                $id+=1;
            }
            $mail=$_POST['email'];
            $bucket=[$id,$firstname,$lastname,$password_harshed,$mail];
            // Save to data.txt
            $handle = fopen($data, 'a') or die('Cannot open file:  ');
            $ser = base64_encode(serialize($bucket));
            $new_data = "\n".$ser;
            fwrite($handle, $new_data);
            fclose($handle);

            // Save to readable.txt
            $handle_r = fopen('readable.txt', 'a') or die('Cannot open file:  ');
            $ser = serialize($bucket);
            $new_data = "\n".$ser;
            fwrite($handle_r, $new_data);
            fclose($handle_r);
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["firstname"] = $firstname;
            $_SESSION['lastname']= $lastname;
            $_SESSION['mail']=$mail;

            header("location: welcome.php");
            exit();


        }
        else{
            $general_err="Something went wrong please try again";
        }
    }

}