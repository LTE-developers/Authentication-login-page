<?php
include 'signup.php';
include 'signin.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" 
    integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Basic Login | Sign Up</title>
</head>
<body>
    <div id="container">
        <div class="SignUp-container"> 
                <h2 class="intro-text">Sign Up</h2>  
                <p>Please fill in this form to create an account</p>  
                <form action="index.php" method="post" class="form-signup-body">
                    <?php
                    if($firstname_err!=''){
                        echo "<div  style='background-color: red;'>";
                        echo $firstname_err;
                        echo "</div>";
                    }
                    else if($lastname_err!=''){
                        echo "<div  style='background-color: red;' >";
                        echo $lastname_err;
                        echo "</div>";
                    }
                    else if($mail_err!=''){
                        echo "<div  style='background-color: red;'>";
                        echo $mail_err;
                        echo "</div>";
                    }
                    else if ($password_err!=''){
                        echo "<div  style='background-color: red;' >";
                        echo $password_err;
                        echo "</div>";
                    }
                    else if ($confirm_password_err!=''){
                        echo "<div style='background-color: red;'>";
                        echo $confirm_password_err;
                        echo "</div>";
                    }
                    else if($general_err!=''){
                        echo "<div style='background-color: red;'>";
                        echo $general_err;
                        echo "</div>";
                    }


                    ?>
                 <div class="Name-Area">
                    <input type="text"  placeholder="First Name" name="firstname" id="">
                    <input type="text"  placeholder="Last Name" name="lastname" id="">
                 </div>

                    <input type="email" name="email"placeholder="Email" id="">
                    <input type="password"placeholder="Password" name="password" id="">
                    <input type="password"placeholder="Confirm Password" name="confirm_password" id="">
                    <label class="checkbox"><input type="checkbox" name="" id="">
                        <span></span>I accept the <p> terms of Use & Privacy Policy</p> </label>
                    <button type="submit" name="signup" class="btn signup">Sign Up</button>

                    <div class="signin-text">
                        <div class="line"></div><p>OR SIGNUP WITH</p><div class="line"></div>
                    </div>
                    <div class="socials">
                        <button class="btn Facebook"><i class="fab fa-facebook-f"></i>Facebook</button>
                        <button class="btn Google"><i class="fab fa-google-plus-g"></i>Google</button>
                    </div>

                </form>

            <div class="signInLink"><p>Already have an account? <a href="#">Sign in.</a></p></div>
        </div>
        <div class="form-container">
            <div class="wrapper">
              <form action="index.php" method="post" class="form-signin-body">
                        <?php
                        if($empty_email_err!=''){
                            echo "<div style='background-color: red;' class='alert-danger'>";
                            echo $empty_password_err;
                            echo "</div>";
                        }
                        elseif ($empty_password_err!=''){
                            echo "<div style='background-color: red;' class='alert-danger'>";
                            echo $empty_password_err;
                            echo "</div>";
                        }
                        else if($check_password_err!=''){
                            echo "<div style='background-color: red;' class='alert-danger'>";
                            echo $check_password_err;
                            echo "</div>";
                        }
                        else if($check_mail_err!=''){
                            echo "<div style='background-color: red;'>";
                            echo $check_mail_err;
                            echo "</div>";
                        }
                        else if($invalid_err!=''){
                            echo "<div style='background-color: red;'>";
                            echo $invalid_err;
                            echo "</div>";
                        }
                        ?>
                
                <h2 class="intro-text Welcome">Welcome Back</h2>
                <div class="text-area">
                        <i class="far fa-envelope"></i>
                    <input type="email" placeholder="Enter Email" name="email">
                </div>
                <div class="text-area password">
                        <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Enter password" name="password">
                </div>
                    <a href="#">Forget your password?</a>
                    <label class="checkbox">
                        <input type="checkbox" class="checkbox">
                        <span></span>
                        Remember me  
                      </label>
                
                    <button class="btn" name="signin" type="submit">Sign in</button>
              </form></div>
        </div>
    </div>
    
</body>
</html>