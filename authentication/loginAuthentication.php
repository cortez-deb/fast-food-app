<?php
if(isset($_SERVER['HTTP_REFERER'])){
    session_start();
    require($_SERVER["DOCUMENT_ROOT"]."/connect.php");
    $db_connect=pdo_connect_mysql();
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    $userexistsQuery = $db_connect->query("SELECT * FROM user WHERE email='$email'");
    $userexists = $userexistsQuery->fetch(PDO::FETCH_ASSOC);
    if(empty($userexists)){
        $response["success"] = false;
        $response["error"] = "Invalid login credentials";
    }else{
        if(!password_verify($password,$userexists["password"])){
            $response["success"] = false;
            $response["error"] = "Invalid login credentials";
        }else{
            $_SESSION["user_authenticated"] = true;
            $_SESSION["user"] = $userexists;
            if($userexists["isAdmin"]){
                $contacts_query = $db_connect->query("SELECT * FROM contact");
                $_SESSION["contacts"] = $contacts_query->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    echo(json_encode($response));
}else{
    include($_SERVER["DOCUMENT_ROOT"]."/models/not_found_page.php");
}
?>