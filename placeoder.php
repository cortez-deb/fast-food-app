<?php 
$_SESSION["responce"]="";
if(isset($_GET['id'])){
    $proid = $_GET['id'];
   $quantity= $_SESSION['cart'][$proid]['qty'];
   $name =$_SESSION['email'];
   if(isset($_POST['submit'])){
    $transactionCode=htmlspecialchars($_POST['mpesacode']);
   try{
    $stmt=$pdo->prepare("SELECT * FROM payment WHERE mpesacode ='{$transactionCode}';");
    $stmt->execute();
    $PaymentData= $stmt->fetchALL(PDO::FETCH_ASSOC);
        if(!empty($PaymentData)){
            foreach($PaymentData as $pr):
                $paidAmount=$pr['amount'];
            endforeach;
                try{
                    $stmt=$pdo->prepare("SELECT * FROM meal WHERE meal_ID ='{$proid}';");
                    $stmt->execute();
                    $Data= $stmt->fetchALL(PDO::FETCH_ASSOC);
                   foreach($Data as $pr):
                    $price=$pr["price"];
                    $mealid=$pr['meal_ID'];
                   endforeach;
                   $payout=pricecalcutor($quantity,$price);
                    if($paidAmount<=$payout){
                        $stmt = $pdo->prepare("INSERT INTO oders(`mealID`, `amount`, `price`, `email`)
                        VALUES ('{$mealid}','{$quantity}','{$price}','{$name}');");
                       $stmt->execute();
                       if($stmt)
                       {
                       try{
                        $stmt = $pdo->prepare("UPDATE payment SET  meal_ID='{$mealid}' WHERE mpesacode='{$transactionCode}';");
                        $stmt->execute();
                        $stmt = $pdo->prepare("UPDATE payment SET  oderId='{$proid}' WHERE mpesacode='{$transactionCode}';");
                        $stmt->execute();
                             if($stmt){
                                unset($_SESSION['cart'][$proid]);
                                 $_SESSION["responce"]='<span class="text-danger">Oder Placed PLease wait for confirmation</span>';
                                 header("location:router.php?page=cart& reply='{$_SESSION["responce"]}'");
                             }
                             else{
                                 $_SESSION["responce"]='<span class="text-danger">Error occured try again later</span>';
                                 header("location:router.php?page=cart& reply='{$_SESSION["responce"]}'");  
                             }
                       }catch(PDOException $e){
                        $e->getMessage();
                       }
 
                       }
                    }
                    else{
                        $_SESSION["responce"]='<span class="text-danger">Payment not full</span>';

                    }
                   
                }catch(PDOException $ex){
            
                }
                
        }
        else{
            $_SESSION["responce"]='<span class="alert alert-danger" role="alert">Code Not found Please try agiain later</span>';
            header("location:router.php?page=cart& reply='{$_SESSION["responce"]}'");
        }
   }catch(PDOException $e){

   }


}}
function pricecalcutor($quantity,$price){
return $quantity*$price;
}
