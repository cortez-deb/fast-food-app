<?php
class login_controler extends login{
private $email;
private $passsword;

public function __construct($email,$passsword)
{
 $this->email=$email;
 $this->passsword= $passsword; 
}
public function user(){
    if($this->emptyInputs()==false){
        header("location:../../views/signup.php? error=Empty Fields Not Allowed");
        exit();
    }
    $this -> loginUser($this->email,$this->passsword);
}
private function emptyInputs(){
    $responce="";

    if(empty($this->email)||empty($this->passsword)){
    $responce = false;
    }
    else {
    $responce = true;

    }
    return $responce ;
}
 }