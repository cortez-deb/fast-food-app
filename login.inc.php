<?php
 
   if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")) {
    header("location:login.php");
    exit;
}
?>