<?php 
if(isset($_GET['id'])){
    $proid = $_GET['id'];
   $quantity= $_SESSION['cart'][$proid]['qty'];

   
   try{
    try{
        $stmt=$pdo->prepare("SELECT price FROM meal WHERE meal_ID ='{$proid}';");
        $stmt->execute();
        $price= $stmt->fetchALL(PDO::FETCH_ASSOC);
       foreach($price as $pr):
        $price=$pr["price"];
       endforeach;
       $payout=pricecalcutor($quantity,$price);
       echo $payout;
    }catch(PDOException $ex){}
    $stmt = $pdo->prepare("INSERT INTO user( `user_ID`, `email`, `password`,`access`) VALUES ('{$user_id}','{$email}','{$hashedPassword}','{$access}')");
    $stmt->execute();
    if($stmt){header("location:login.php");}
    }
    catch(PDOException $exception){
        $responce["success"]=false;
    }

}
function pricecalcutor($quantity,$price){
return $quantity*$price;
}
?>