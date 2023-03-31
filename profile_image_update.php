<?php
require('connect.php');
include 'login.inc.php';
$pdo = pdo_connect_mysql();
$error="";
 if($_SERVER["REQUEST_METHOD"]=="POST"){
            $fileExtensionsAllowed = ['jpeg','jpg','png']; 
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES['image']['size'];
            $fileTmpName  = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
            $fileArray = explode('.',$_FILES['image']['name']);
            $fileExtension = strtolower(end($fileArray));
            $currentUsereMail= $_SESSION['email'];

            $responce = [
                "success" => true,
                "error" => [
                    "image" => ""
                ]
            ];
        if($fileSize){
            if(!in_array($fileExtension,$fileExtensionsAllowed)){
                $response["success"] = false;
                $response["error"]["image"] ='<span class="text-danger">This file extension is not allowed. Please upload a JPEG or PNG file</span>';
            }else{
                if ($fileSize > 6000000) {
                    $response["success"] = false;
                    $error=$response["error"]["image"] ='<span class="text-danger">File exceeds maximum size (6MB)</span>';
                }else{
                    $newFileName = $_SESSION['email'].".".$fileExtension; 
                    try {
                        $currentUsereMail= $_SESSION['email'];
                        $userdataQuery = $pdo->query("SELECT * FROM user WHERE email='{$currentUsereMail}';");
                        $userData = $userdataQuery->fetch(PDO::FETCH_ASSOC);
                        if(empty($userData)){
                            $error = '<span class="text-danger">Details Please update your detils</span>';
                        }
                        else{
                        $image=$userData['image'];
                        $accesslevel=$userData['access'];
                        if(empty($image)){
                            if(move_uploaded_file($fileTmpName, __DIR__."/profile/".$newFileName)){
                                $response["success"] = true;
        
                                if($response["success"]){
                                    try {
                                        $stmt = $pdo->prepare("UPDATE user SET  image='{$newFileName}' where  email='{$currentUsereMail}' ;");
                                        $stmt->execute();
                                        if ($stmt) {
                                            $error = '<span class="text-danger">Details have been updated</span>';
                                            header("location:router.php?delivery");
                                            
                                        }
                                        else{
                                            $error='<span class="text-danger">Failed to update</span>';
                                        }
                                    } catch (PDOException $ex) {
                                        $success =$ex->getMessage();
                                                }
                                }
                            }else{
                                $response["success"] = false;
                                $error=$response["error"]["image"] = '<span class="text-danger">An error occured while uploading your profile image. Please try again later</span>';
                            }
                        }else{
                            $filename ="profile/{$image}";
                            if (unlink($filename)) {
                                if(move_uploaded_file($fileTmpName, __DIR__."/profile/".$newFileName)){
                                    $response["success"] = true;
            
                                    if($response["success"]){
                                        try {
                                            $stmt = $pdo->prepare("UPDATE user SET  image='{$newFileName}' where  email='{$currentUsereMail}' ;");
                                            $stmt->execute();
                                            if ($stmt) {
                                                $error = '<span class="text-danger">Details have been updated</span>';
                                                if($accesslevel==1){
                                                    header("location:adminRouter.php?adminDashboard"); 
                                                }
                                                elseif($accesslevel==2){
                                                    header("location:router.php?dashboard");
                                                }                                        
                                                elseif($accesslevel==3){
                                                    header("location:deliverrouter.php?delivery");
                                                }
                                            }
                                            else{
                                                $error='<span class="text-danger">Failed to update</span>';
                                            }
                                        } catch (PDOException $ex) {
                                            $success =$ex->getMessage();
                                                    }
                                    }
                                }else{
                                    $response["success"] = false;
                                   $error= $response["error"]["image"] = '<span class="text-danger">An error occured while uploading your profile image. Please try again later</span>';
                                }
                            } 
                        }
                                    
                        }
                    }
                     catch (PDOException $ex)
                      {
                        $success =$ex->getMessage();
                        $responce["responce"] = $success;
                                
                    }
                    


                }
            }
        
        }else{
            $response["success"] = false;
            $response["error"]["image"] = '<span class="text-danger">The image type is not supported</span>';
        }
        }
        else {
            echo "fsil";
        }

    
?>