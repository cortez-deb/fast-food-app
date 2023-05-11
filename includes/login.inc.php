<?php 
if(isset($_POST['Submit'])){

    $email =stripslashes( htmlspecialchars($_POST["email"]));
    $password =stripslashes( htmlspecialchars($_POST["password"]));
//instanciate classess
include "../classes/connect.php";
include "../classes/login.database.php";
include "../classes/login.controler.classes.php";
}