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
            $stmt->fetch(PDO::FETCH_ASSOC);
           if(!password_verify($password,$stmt["password"])){
            $resulCheck = false;
           }else{
            $stmt = $this->connect()->prepare("SELECT * FROM user WHERE email =?");
            $stmt->execute(array($email));
            $details=$stmt->fetch(PDO::FETCH_ASSOC);
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
           }
        }
         else {
            header("location:../views/login.php?error=check your cridentials");
        }
        return $resulCheck;
    }
}
