<?php 
$emailEmptyerror="";
$emailExistserror="";
$passwordEmptyerror="";
$confirmPasswordEmptyerror="";
$passwordMissMatcherror="";
$passwordLengthError="";
include 'connect.php';
if(isset($_POST['Submit'])){
    $pdo=pdo_connect_mysql();
    $email =stripslashes( htmlspecialchars($_POST["email"]));
    $password =stripslashes( htmlspecialchars($_POST["password"]));
    $confirmpassword =stripslashes( htmlspecialchars($_POST["confirmpassword"]));
    $responce=[
        "success" => true,
        "error" => [
            "email" => "",
            "password" => "",
            "confirmpassword" => "",
            "checkpassword" => ""]
    ]; 
    if(empty($email)||empty($password)||empty($confirmpassword)){
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
            if(empty($confirmpassword)){
                $responce["success"]=false;
                $responce["error"]["confirmpassword"]='<span class="text-danger">this field is required</span>';
                $confirmPasswordEmptyerror=$responce["error"]["confirmpassword"];
            }

        }
         else{
            if(strlen($password)<8){
                $response["success"] = false;
                $response["error"]["checkpassword"] = '<span class="text-danger">Your password should be atleast 8 characters and less than 15</span>';
                $passwordLengthError=$responce["error"]["checkpassword"];         
            }
            elseif($responce["success"]){
                if(!($password==$confirmpassword)){
                    $response["success"] = false;
                    $response["error"]["checkpassword"] ='<span class="text-danger">passwords should match</span>';
                    $passwordMissMatcherror=$responce["error"]["checkpassword"];
                    
                } else{
                    if($responce["success"]){
                        if($responce["success"]){
                            $userEmailExistsQuery = $pdo->query("SELECT * FROM user WHERE email='{$email}'");
                            $userEmailExists = $userEmailExistsQuery->fetch(PDO::FETCH_ASSOC);
                            if(!empty($userEmailExists)){
                                $response["success"] = false;
                                $response["error"]["email"] = '<span class="text-danger">"An account this email already exists,proceed to login"</span>';
                                $emailExistserror=$responce["error"]["email"];
                                               
                            }
                            else{        
                            if($responce["success"])
                            {  
                                    try{      
                                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
                                    $user_id=$email;
                                    $access=2;
                                    $stmt = $pdo->prepare("INSERT INTO user( `user_ID`, `email`, `password`,`access`) VALUES ('{$user_id}','{$email}','{$hashedPassword}','{$access}')");
                                    $stmt->execute();
                                    if($stmt){header("location:login.php");}
                                    }
                                    catch(PDOException $exception){
                                        $responce["success"]=false;
                                    }
                                }
                
                            }
                        }
                        else{
                            echo(json_encode($response));
                        }
                    }
                }
            }

        }
    
    
}
