<?php 

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
                                        $stmt =  $pdo->query("SELECT * FROM user WHERE email='{$email}'");
                                        $stmt->execute();
                                        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($details as $data):
                                          $mail=$data["email"];  
                                          $accesslevel=$data['access'];
                                        endforeach;
                                        if($accesslevel==1){
                                            session_start();
                                            $_SESSION['email']=$mail;
                                            $_SESSION['access']=$accesslevel;
                                            $_SESSION["login"] = "OK";
                                            header("location:adminRouter.php?page=adminDashboard"); 
                                        }
                                        elseif($accesslevel==2){
                                            session_start();
                                            $_SESSION['email']=$mail;
                                            $_SESSION['access']=$accesslevel;
                                            $_SESSION["login"] = "OK";
                                            header("location:hotelrouter.php?page=hotelmanager");
                                        }                                        
                                        elseif($accesslevel==3){
                                            session_start();
                                            $_SESSION['access']=$accesslevel;
                                            $_SESSION['email']=$mail;
                                            $_SESSION["login"] = "OK";
                                            header("location:deliverRouter.php?page=deliverDashboard");
                                        }
                                        elseif($accesslevel==4){
                                            session_start();
                                            $_SESSION['access']=$accesslevel;
                                            $_SESSION['email']=$mail;
                                            $_SESSION["login"] = "OK";
                                            header("location:router.php?page=index");
                                        }

                                    }catch(PDOException $e){

                                    }

                                }
                            }    
                    }
                }
            }
        