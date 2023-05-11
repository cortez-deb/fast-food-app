<?php
class login extends database
{
    protected function loginUser($email, $password)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM user WHERE email=?");
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location:../views/login.php?error=check your cridentials");
            exit();
        }
        $resulCheck = "";
        if ($stmt->rowCount() > 0) {
            $stmt = $this->connect()->prepare("SELECT password FROM user WHERE email =?");
            $stmt->execute(array($email));
            $hash =$stmt->fetch();
           if(!password_verify($password,$hash[0])){
            $resulCheck = false;
           }else{
            $stmt = $this->connect()->prepare("SELECT * FROM user WHERE email =?");
            $stmt->execute(array($email));
            $details=$stmt->fetch(PDO::FETCH_ASSOC);
                $mail=$details["email"];  
                $accesslevel= $details["access"];
              if($accesslevel==1){
                session_start();
                $_SESSION['email']=$mail;
                $_SESSION['access']=$accesslevel;
                $_SESSION["login"] = "OK";
                header("location:../views/adminRouter.php?page=adminDashboard"); 
            }
            elseif($accesslevel==2){
                session_start();
                $_SESSION['email']=$mail;
                $_SESSION['access']=$accesslevel;
                $_SESSION["login"] = "OK";
                header("location:../views/hotelrouter.php?page=hotelmanager");
            }                                        
            elseif($accesslevel==3){
                session_start();
                $_SESSION['access']=$accesslevel;
                $_SESSION['email']=$mail;
                $_SESSION["login"] = "OK";
                header("location:../views/deliverRouter.php?page=deliverDashboard");
            }
            elseif($accesslevel==4){
                session_start();
                $_SESSION['access']=$accesslevel;
                $_SESSION['email']=$mail;
                $_SESSION["login"] = "OK";
                header("location:../views/router.php?page=index");
            }
           }
        }
         else {
            header("location:../views/login.php?error=check your cridentials");
        }
        return $resulCheck;
    }
}
