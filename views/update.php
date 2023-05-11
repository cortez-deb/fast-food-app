<?php
$payout = "";
if ($_POST['update']) {

  $Mealid = $_POST['upid'];
  $price = "";
  $column = array_column($_SESSION['cart'], 'pro_id');
  try {
    $stmt = $pdo->prepare("SELECT price FROM meal WHERE meal_ID ='{$Mealid}';");
    $stmt->execute();
    $price = $stmt->fetchALL(PDO::FETCH_ASSOC);
    foreach ($price as $pr) :
      $price = $pr["price"];
    endforeach;
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
  if (in_array($_POST['upid'], $column)) {
    $_SESSION['cart'][$Mealid]['qty'] = $_POST['qty'];
    $payout = pricecalcutor($_POST['qty'], $price);
  } else {
    $item = [
      'pro_id' => $Mealid,
      'qty' => 1
    ];
    $_SESSION['cart'][$Mealid] = $item;
    $payout = $price;
  }
  header("location: router.php?page=cart& price='{$payout}'");

}
function pricecalcutor($quantity, $price)
{
  return $quantity * $price;
}
