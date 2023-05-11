<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>userdashboard.html</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
   rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/android-chrome-192x192.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/android-chrome-512x512.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500&display=swap"
   rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<?php include 'navigation.php';
if (isset($_GET['reply'])) {
    $reply = $_GET['reply'];
  }
else{
  $price ="";
  $reply="";
}
if (isset($_SESSION['cart'])){
?>
<div class="container">
  <div class="row">
  <table class="col-12 table my-3">
    <div class="container">
      <div class="row">
        <div class="col"><?=$reply ?></div>
      </div>
    </div>
    <thead>
      <tr class="text-center">
        <th>S.no</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Amount</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php   
        $i = 1;
        try{
          foreach ($_SESSION['cart'] as $cart) :
            $mealid=$cart['pro_id'];
          endforeach;
          if(!empty($mealid)){
            $stmt=$pdo->prepare("SELECT * FROM meal WHERE meal_ID ='{$mealid}';");
            $stmt->execute();
            $Data= $stmt->fetchALL(PDO::FETCH_ASSOC);
            foreach($Data as $pr):
              $price=$pr['price'];
              $mealid=$pr['meal_ID'];
              $mealName=$pr['name'];
             endforeach;
          }
        }
         catch(PDOException $e){
            echo $e->getMessage();
         }  
         if(!empty($_SESSION['cart'])){  
        foreach ($_SESSION['cart'] as $cart) :
      ?>
          <tr class="text-center">
            <td><?php echo $i; ?> </td>
            <td> <?=$mealName?></td>
            <td>
              <form action="router.php?page=update" method="post">
                <input type="number" value="<?= $cart['qty']; ?>" name="qty" min="1">
                <input type="hidden" name="upid" value="<?= $cart['pro_id']; ?>">
            </td>
            <td>
              KSh.
              <?= $price*$cart['qty'];
                ?>
                </td>
            <td>
              <input type="submit" name="update" value="Update" class="btn btn-sm btn-primary">
              </form>
            </td>
            <td><a class="btn btn-sm btn-danger" href="router.php?page=removecartitem& id=<?= $cart['pro_id']; ?>">Remove</a></td>
            <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Place order
              </button>
            </td>
          </tr>
      <?php
          $i++;
        endforeach; 
      }
      else{
      }
      ?>
    </tbody>
    <?php
    if(empty($_SESSION['cart'])){
      echo('<span class="alert alert-info" role="alert">No ITEMS IN CART</span>');
    }
    ?>
  </table>
  </div>
<?php } 
      
      ?>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel text-center">MPesa Pay Bill</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card   shadow text-success">
            <div class="row g-0">
              <div class="col">
                <div class="card-body">
                  <div class="card-text">
                    <H1>Pay Bill:32313</H1>
                  </div>
                  <div class="card-text">
                    <H3>Enter Transaction Code and Oder Id as the account number</H3>
                  </div>
                  <form action="router.php?page=placeoder& id=<?= $cart['pro_id'];?>" method="post">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="number" class="form-label">Code</label>
                        <input type="text" class="form-control " style="width: 20rem;" name="mpesacode" placeholder="<?php echo "error" ?>">
                      </div>
                    <div class="modal-footer">
                      <input type="submit" data-bs-dismiss="modal" name="submit" value="submit" class="form-control mt-0 bg-success">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php  include 'footer.php'; ?>