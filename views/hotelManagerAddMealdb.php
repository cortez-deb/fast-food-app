<?php
 $emptyName="";
 $emptyprice="";
 $emptyDescription="";
 $image="";
 $added="";
if (isset($_POST["Submit"])) {
    $pdo = pdo_connect_mysql();
    $name =strtoupper( check($_POST['name']));
    $description =strtoupper(check($_POST['description']));
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
    if (empty($name) || empty($description) || empty($price)||empty($fileArray)) {
        if (empty($name)) {
            $responce['success'] = false;
            $responce['error']['name'] = '<span class="alert alert-danger col-3" role="alert">Please enter name</span>';
            $emptyName = $responce['error']['name'];
        }
        if (empty($description)) {
            $responce['success'] = false;
            $responce['error']['description'] = '<span class="alert alert-danger col-3" style="height: max 10px;" role="alert">Description required</span>';
            $emptyDescription = $responce['error']['description'];
        }
        if (empty($price)) {
            $responce['success'] = false;
            $responce['error']['price'] = '<span class="alert alert-danger col-3" role="alert">Please enter price</span>';
            $emptyprice = $responce['error']['price'];
        }
        if (empty($fileArray)) {
            $responce['success'] = false;
            $responce['error']['price'] = '<span class="alert alert-danger col-3" role="alert">Image Required</span>';
            $image = $responce['error']['image'];
        }
    } else {
        if (is_numeric($price)) {
            $responce['success'] = true;
        } else {
            $responce['success'] = false;
            $responce['error']['price'] = '<span class="alert alert-danger" role="alert">Please enter a valid number</span>';
            $emptyprice = $responce['error']['price'];
        }
        if($responce){
            if($fileSize){
                if(!in_array($fileExtension,$fileExtensionsAllowed)){
                    $response["success"] = false;
                    $response["error"]["image"] ='<span class="alert alert-danger" role="alert">This file extension is not allowed. Please upload a JPEG or PNG file</span>';
                    $image=$response["error"]["image"];
                }else{
                    if ($fileSize > 6000000) {
                        $response["success"] = false;
                        $error=$response["error"]["image"] ='<span class="alert alert-danger" role="alert">File exceeds maximum size (6MB)</span>';
                        $image=$response["error"]["image"];
                    }else{
                        $newFileName = $name.".".$fileExtension;
                        if(move_uploaded_file($fileTmpName,__DIR__."/photos/".$newFileName)){
                            try{
                                $stmt=$pdo->prepare("INSERT INTO meal(`name`, `image`, `price`,`description`)
                                VALUES ('{$name}','{$newFileName}','{$price}','{$description}');");
                               $stmt->execute();
                               if($stmt){
                                   $added='<span class="alert alert-success" role="alert">Meal added</span>';
                               }else{
                                   $added='<span class="alert alert-danger" role="alert">Error occcured</span>';
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