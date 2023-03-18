<?php
session_start();
$firstNameEmpty = "";
$secondNameEmpty = "";
$address1Empty = "";
$address2Empty = "";
$townEmpty = "";
$streetEmpty = "";
$zipEmpty = "";
$phoneEmpty = "";
$success="";
$pdo = pdo_connect_mysql();
$firstname = "";
$secondname = "";
$address1 = "";
$address2 = "";
$town = "";
$street = "";
$zip = "";
$phone ="";
retrieve($pdo);
if (isset($_POST['Submit'])) {
    $pdo = pdo_connect_mysql();
    $firstname = check($_POST['firstname']);
    $secondname = check($_POST['lastname']);
    $address1 = check($_POST['address1']);
    $address2 = check($_POST['address2']);
    $town = check($_POST['town']);
    $street = check($_POST['street']);
    $zip = check($_POST['zip']);
    $phone = check($_POST['phone']);

    $responce = [
        "success" => true,
        "error" => [
            "firstname" => "",
            "secondname" => "",
            "address1" => "",
            "address2" => "",
            "town" => "",
            "street" => "",
            "zip" => "",
            "phone" => ""
        ]
    ];
    if (empty($firstname) || empty($secondname) || empty($address1) || empty($address2) || empty($town) || empty($street) || empty($zip) || empty($phone)) {
        if (empty($firstname)) {
            $responce["error"]["firstname"] = '<span class="text-danger">first name required</span>';
            $responce["success"] = false;
            $firstNameEmpty=$responce['error']['firstname'];
        }
        if (empty($secondname)) {
            $responce["error"]["secondname"] = '<span class="text-danger">Second name required</span>';
            $responce["success"] = false;
            $secondNameEmpty=$responce['error']['secondname'];
        }
        if (empty($address1)) {
            $responce["error"]["address1"] = '<span class="text-danger">Address 1 is required</span>';
            $responce["success"] = false;
            $address1Empty=$responce['error']['address1'];
        }
        if (empty($address2)) {
            $responce["error"]["address2"] = '<span class="text-danger">Address 2 is required</span>';
            $responce["success"] = false;
            $address2Empty=$responce['error']['address2'] ;
        }
        if (empty($town)) {
            $responce["error"]["town"] = '<span class="text-danger">Town is required</span>';
            $responce["success"] = false;
            $townEmpty=$responce['error']['town'];
        }
        if (empty($street)) {
            $responce["error"]["street"] = '<span class="text-danger">Street is required</span>';
            $responce["success"] = false;
            $streetEmpty=$responce['error']['street'];
        }
        if (empty($zip)) {
            $responce["error"]["zip"] = '<span class="text-danger">Zip is required</span>';
            $responce["success"] = false;
            $zipEmpty=$responce['error']['zip'];
        }
        if (empty($phone)) {
            $responce["error"]["phone"] = '<span class="text-danger">Phone is required</span>';
            $responce["success"] = false;
            $phoneEmpty=$responce['error']['phone'] ;
        }
    } else {
        if ($responce["success"]) {
            try {
                $currentUsereMail= $_SESSION['email'];
                $stmt = $pdo->prepare("UPDATE user SET firstname='{$firstname}' , lastname='{$secondname}', address1='{$address1}', address2='{$address2}', town='{$town}', street='{$street}', zip='{$zip}', phone='{$phone}' where  email='{$currentUsereMail}' ;");
                $stmt->execute();
                if ($stmt) {
                    $success = '<span class="text-danger">Details have been updated</span>';
                }
                else{
                    $success='<span class="text-danger">Failed to update</span>';
                }
            } catch (PDOException $ex) {
                $success =$ex->getMessage();
                        }
        }
        else{
           header("location:index.php");
        }
        //echo (json_encode($response));
        
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
function retrieve($pdo){
    try {
        $currentUsereMail= $_SESSION['email'];
        $userdataQuery = $pdo->query("SELECT * FROM users WHERE email='{$currentUsereMail}");
        $userData = $userdataQuery->fetch(PDO::FETCH_ASSOC);
        if(empty($userData)){
            $success = '<span class="text-danger">Details Please update your detils</span>';
        }else{
            $responce = [
                    "firstname" => $userData['firstname'],
                    "secondname" => $userData['lastname'],
                    "address1" => $userData['address1'],
                    "address2" => $userData['address2'],
                    "town" => $userData['town'],
                    "street" => $userData['street'],
                    "zip" => $userData['zip'],
                    "phone" => $userData['phone'],  
            ];
        }
    }
     catch (PDOException $ex)
      {
        $success =$ex->getMessage();
                
    }
    return $responce;
}
