<?php 
$messege="";
if(isset($_GET['id'])){
    $proid = $_GET['id'];
   $quantity= $_SESSION['cart'][$proid]['qty'];
   $name =$_SESSION['email'];
   
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
    $stmt = $pdo->prepare("INSERT INTO oders(`mealID`, `amount`, `price`, `email`)
     VALUES ('{$proid}','{$quantity}','{$price}','{$name}');");
    $stmt->execute();
    if($stmt)
    {$messege='<span class="text-danger">Oder Placed PLease wait for confirmation</span>';
        header("location:router.php?page=cart& reply='{$messege}'");}
    }
    catch(PDOException $exception){
        $responce["success"]=false;
    }

}
function pricecalcutor($quantity,$price){
return $quantity*$price;
}
?>