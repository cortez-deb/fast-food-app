<?php
class signup extends database{
    protected function checkIfUserExists($email){
        $stmt = $this->connect()->prepare('SELECT email from user where email= ? ;');

        if(!$stmt->execute(array($email))){
            $stmt = null;
            header("location:../views/signup.php?error=stmentfailed");
            exit();
        }
        $resulCheck ="";
        if($stmt->rowCount()>0){
            $resulCheck=false;
        }
        else{
            $resulCheck= true;
        }
        return $resulCheck;
    }

    protected function createUser($email,$password){
        $stmt = $this->connect()->prepare('INSERT INTO user(email,password,access) values(?,?,?) ;');
        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
        $access = 4;
        if($stmt->execute(array($email,$hashedpassword,$access))){
            $stmt = null;
            header("location:../views/login.php");
            exit();
        }
        $stmt = null;
    }
}