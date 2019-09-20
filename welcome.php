<?php

session_start();

if(!isset($_SESSION["id"])){
header("location: index.php");
exit;
}
/**echo 'you are in!';
echo "\n"."Welcome ".$_SESSION['firstname']." ".$_SESSION['lastname']." ".$_SESSION['mail'];
echo "\n";
echo "\n";
echo "Below are the names of the froup members";


 *
 * ATTACH THE LOGOUT.PHP SCRIPT TO A LOGOUT BUTTON.
 * ENJOY!
 */?>
 
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
        <div class="SignUp-container"> <?php
echo $_SESSION['firstname']." ".$_SESSION['lastname'];
				?>
                <h2 class="intro-text design">Welcome Back....</h2>
                <p class="description">LTE developers is made up of young enthusiastic minds, our goal is to provide solutions in the IT world.
                        <div>We are the future of tech...</div></p>
                        <a href="logout.php"><button class="btn signOut">Sign Out</button></a>  
        </div>
            <div class="wrapper">  
                    <div class="teamView">
					 <h2 class="intro-text">Hi, meet the team<i class="far fa-laugh"></i></h2>
                          <div class="team">Frontend</div>       
                           <p>Mbata Precious (@Mbata Precious)</p> 
                          <p>Sanni Lincoln Sunday(@lincoln)</p>  
                          <p>Keenam Lesuanu (@nenyie)</p>  
                          <p>Sodiq (@Sodiq)</p>  
                          <p> Taiwo Sodiq(@sidoqode)</p> 
                            <br />
                          <div class="team">Backend</div>
                            <p>Gabriel Ifoga (@Dr_Omoh) <strong>{T.L}</strong></p> 
                            <p> Oyebamiji Oluwatobi (@oyebamiji Oluwatobi)</p> 
                            <p>  Isaiah Osei-Mensah (@Mensaiah)</p>
                            <br />
                            <div class="team">UI/UX Designer</div>
                            <p> Yekini Kolawole Babatunde (@Akolawole)</p>
                            <p>Dada Ezekiel (@Dada Ezekiel)</p>  
                    </div>              
        </div>
        
    </div>
    
</body>
</html>