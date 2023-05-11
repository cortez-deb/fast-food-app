<?php
$responce='';
if(isset($_GET["pro_id"])){
$productID= $_GET["pro_id"];
try{
    $pdo = pdo_connect_mysql();
    $stmt=$pdo->prepare("DELETE FROM `meal` WHERE `meal_ID`='{$productID}';");
    $stmt->execute();
    if($stmt){
             $responce='<span class="alert alert-success" role="alert">Meal Deleted</span>';
             header("location:hotelrouter.php?page=hotelManagerMeals& responce='{$responce}'");
    }
    else{
          $responce='<span class="alert alert-danger" role="alert">Error occcured while deleting please try again later or contact the admin</span>';
          header("location:hotelrouter.php?page=hotelManagerMeals& responce='{$responce}'");
     }
}
catch(PDOException $e){
echo $e->getMessage();
}
}