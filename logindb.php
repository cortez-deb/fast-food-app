<?php 
session_start();
include 'connect.php';

$emailEmptyerror="";
$credentialserror="";
$passwordEmptyerror="";
if(isset($_POST['Submit'])){

    $pdo=pdo_connect_mysql();
    $email =stripslashes( htmlspecialchars($_POST["email"]));
    $password =stripslashes( htmlspecialchars($_POST["password"]));
    $responce=[
        "success" => true,
        "error" => [
            "email" => "",
            "password" => "",]
    ]; 
    if(empty($email)||empty($password)){
            if(empty($email)){
                    $responce["success"]=false;
                    $responce["error"]["email"]= '<span class="text-danger">Please enter your email</span>';
                    $emailEmptyerror=$responce["error"]["email"];
            }
            if(empty($password)){
                $responce["success"]=false;
                $responce["error"]["password"]='<span class="text-danger">password is required</span>';
                $passwordEmptyerror=$responce["error"]["password"];
                
            }
        }
         else{
              if($responce["success"]){
                        $userexistsQuery = $pdo->query("SELECT * FROM user WHERE email='{$email}'");
                        $userexists = $userexistsQuery->fetch(PDO::FETCH_ASSOC);
                          if(empty($userexists)){
                            $responce["success"]=false;
                            $responce["error"]["email"]= '<span class="text-danger">Please check your details and try again </span>';
                            $credentialserror=$responce["error"]["email"];                             
                            }
                            else{
                                if(!password_verify($password,$userexists["password"])){
                                    $responce["success"]=false;
                                    $responce["error"]["email"]= '<span class="text-danger">Please check your details and try again</span>';
                                    $credentialserror=$responce["error"]["email"];
                                }else{
                                    try{
                                        $username =  $pdo->query("SELECT email FROM user WHERE email='{$email}'");
                                        $username = $username->fetch(PDO::FETCH_ASSOC);
                                        $_SESSION['email']=$username["email"];
                                        $_SESSION["login"] = "OK";
                                        header("Location:router.php?dashboard"); 
                                    }catch(PDOException $e){

                                    }

                                }
                            }    
                    }
                }
            }
        