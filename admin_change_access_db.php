<?php
$access_level="";
$user_removed="";
iF($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['submit'])){
     if(!empty($_POST['action'])){
        $change = $_POST['action'];
        if (isset($_GET['user'])) {

            $usermail = $_GET['user'];
            $delete="delete";
        $pdo = pdo_connect_mysql();
        if (str_contains($change,$delete))
         {       
                try{
                    $stmt = $pdo->prepare("DELETE FROM `user` WHERE `email`='{$usermail}';");
                    $stmt->execute();
                    if($stmt){
                        $user_removed='<span class="text-danger">User has been deleted</span>';
                        $reply=$user_removed;
                        header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'");
                    }
                }catch(PDOException $e){
                    
                    $reply=$e->getMessage();
                    header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'"); 
                }

        } 
        elseif($change==1){
            try{
                $stmt = $pdo->prepare("UPDATE user SET access='{$change}' WHERE email='{$usermail}';");
                $stmt->execute();
                if($stmt){
                    $access_level='<span class="text-danger">User access level changed</span>';
                    $reply=$access_level;
                    header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'");
                }
            }catch(PDOException $ex){
                
                $reply=$ex->getMessage();
                header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'"); 
            }

        }        
        elseif($change==2){
            try{
                $stmt = $pdo->prepare("UPDATE user SET access='{$change}' WHERE email='{$usermail}';");
                $stmt->execute();
                if($stmt){
                    $access_level='<span class="text-danger">User access level changed</span>';
                    $reply=$access_level;
                    header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'");
                }
            }catch(PDOException $ex){
                $reply=$ex->getMessage();
                header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'"); 
            }

        }
        elseif($change==3){
            try{    
             $stmt = $pdo->prepare("UPDATE user SET access='{$change}' WHERE email='{$usermail}';");
            $stmt->execute();
            if($stmt){
                $access_level='<span class="text-danger">User access level changed</span>';
                $reply=$access_level;
                header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'");
            }}catch(PDOException $ex){
                $reply=$ex->getMessage();
                header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'"); 
            }

        }
        else{
            $access_level='<span class="text-danger">error occured</span>';
            $reply=$access_level;
            header("location:adminRouter.php?page=admin_change_access& reply='{$reply}'");
        }
        } 
        
    }}}