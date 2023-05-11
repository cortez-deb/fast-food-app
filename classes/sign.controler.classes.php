<?php
class signup_controler extends signup{
private $email;
private $passsword;
private $confirmpassword;

public function __construct($email,$passsword,$confirmpassword)
{
 $this->email=$email;
 $this->passsword= $passsword;
 $this->confirmpassword= $confirmpassword;   
}
public function signupuser(){
    if($this->emptyInputs()==false){
        header("location:../../views/signup.php? error=Empty Fields Not Allowed");
        exit();
    }
    if($this->invalidEmail()==false){
        header("location:../../views/signup.php? error=invalidemail");
        exit();
    }
    if($this->invalidpassword()==false){
        header("location:../../views/signup.php? error=invalidpassword");
        exit();
    }
    if($this->paswordlength()==false){
        header("location:../../views/signup.php? error=Password Must Be At Least 8 Characters");
        exit();
    }
    if($this->passwordmatch()==false){
        header("location:../../views/signup.php? error=Passwords Don't Match");
        exit();
    }
    if($this->checkuser()==false){
        header("location:../../views/signup.php? error=User With '{$this->email}' already exists");
        exit();
    }
    $this -> createUser($this->email,$this->passsword);
}
private function emptyInputs(){
    $responce="";

    if(empty($this->email)||empty($this->passsword)||empty($this->confirmpassword)){
    $responce = false;
    }
    else {
    $responce = true;

    }
    return $responce ;
}
private function invalidpassword(){
    $result ="";
    if(!preg_match("/^[a-zA-Z0-9]*$/",$this->passsword)){
        $result = false;
    }
    else{
        $result = true;
    }
    return $result;
}
private function invalidEmail(){
    $result ="";
     if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
        $result=false;
     }
     else{
        $result =true;
     }
     return $result;
}
private function paswordlength(){
    $result ="";
    if(strlen($this->passsword)<8){
    $result = false;
    }else{
        $result=true;
    }
    return $result;
}
private function passwordmatch(){
    $result ="";
    if($this->passsword==$this->confirmpassword){
        $result = true;
    }
    else{ $result=false;
    }
    return $result;
}
private function checkuser(){
    $result ="";
    if(!$this->checkIfUserExists($this->email)){
        $result = false;
    }
    else{
        $result = true;
    }
    return $result;
}
 }