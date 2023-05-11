<?php 

if(isset($_POST['Submit'])){
    $email =stripslashes( htmlspecialchars($_POST["email"]));
    $password =stripslashes( htmlspecialchars($_POST["password"]));
    $confirmpassword =stripslashes( htmlspecialchars($_POST["confirmpassword"]));

//instanciate classess
include "../classes/connect.php";
include "../classes/signup.database.php";
include "../classes/sign.controler.classes.php";

$signup = new signup_controler($email,$password,$confirmpassword);
$signup->signupuser();

























}