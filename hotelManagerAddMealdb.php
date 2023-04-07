<?php
 $emptyName="";
 $emptyprice="";
 $emptyDescription="";
 $image="";
 $added="";
if (isset($_POST["Submit"])) {
    $pdo = pdo_connect_mysql();
    $name = check($_POST['name']);
    $description = check($_POST['description']);
    $price = check($_POST['price']);
    $fileExtensionsAllowed = ['jpeg', 'jpg', 'png'];
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES['image']['size'];
    $fileTmpName  = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];
    $fileArray = explode('.', $_FILES['image']['name']);
    $fileExtension = strtolower(end($fileArray));
    $responce = [
        "success" => true,
        "error" => [
            "name" => "",
            "description" => "",
            "price" => "",
            "image" => ""
        ]
    ];
    if (empty($name) || empty($description) || empty($price)) {
        if (empty($name)) {
            $responce['success'] = false;
            $responce['error']['name'] = '<span class="text-danger">Please enter name</span>';
            $emptyName = $responce['error']['name'];
        }
        if (empty($description)) {
            $responce['success'] = false;
            $responce['error']['description'] = '<span class="text-danger">Please enter a short description</span>';
            $emptyDescription = $responce['error']['description'];
        }
        if (empty($price)) {
            $responce['success'] = false;
            $responce['error']['price'] = '<span class="text-danger">Please enter price</span>';
            $emptyprice = $responce['error']['price'];
        }
    } else {
        if (is_numeric($price)) {
            $responce['success'] = true;
        } else {
            $responce['success'] = false;
            $responce['error']['weight'] = '<span class="text-danger">Please enter valid number</span>';
            $emptyprice = $responce['error']['weight'];
        }
        if($responce){
            if($fileSize){
                if(!in_array($fileExtension,$fileExtensionsAllowed)){
                    $response["success"] = false;
                    $response["error"]["image"] ='<span class="text-danger">This file extension is not allowed. Please upload a JPEG or PNG file</span>';
                    $image=$response["error"]["image"];
                }else{
                    if ($fileSize > 6000000) {
                        $response["success"] = false;
                        $error=$response["error"]["image"] ='<span class="text-danger">File exceeds maximum size (6MB)</span>';
                        $image=$response["error"]["image"];
                    }else{
                        $newFileName = $name.".".$fileExtension;
                        if(move_uploaded_file($fileTmpName,__DIR__."/photos/".$newFileName)){
                            try{
                                $stmt=$pdo->prepare("INSERT INTO meal(`name`, `image`, `price`,`description`)
                                VALUES ('{$name}','{$newFileName}','{$price}','{$description}');");
                               $stmt->execute();
                               if($stmt){
                                   $added='<span class="text-danger">Meal added</span>';
                               }else{
                                   $added='<span class="text-danger">Error occcured</span>';
                               }
                            }catch(PDOException $e){
                                echo $e->getMessage();
                            }
                        }
                }
            }
        }
    }
}

}
function check($input)
{
    $input = stripslashes($input);
    $input = strtolower($input);
    $input = htmlspecialchars($input);
    $input = trim($input);
    return $input;
}