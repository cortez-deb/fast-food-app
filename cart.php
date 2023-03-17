<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userdashboard.html</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/android-chrome-512x512.png">    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<?php 
include 'login.inc.php';
 ?>

<?php include 'navigation.php'; ?>

<div class="container">
  <table class="table my-3">
    <a href="emptycart.php" class="btn btn-sm btn-primary mt-2">Empty Cart</a>
    <thead>
      <tr class="text-center">
        <th>S.no</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>

    <tbody>
      <?php
      if (isset($_SESSION['cart'])) :
        $i = 1;
        foreach ($_SESSION['cart'] as $cart) :
      ?>
          <tr class="text-center">
            <td><?php echo $i; ?> # </td>
            <td> Product <?= $cart['pro_id']; ?></td>
            <td>
              <form action="update.php" method="post">
                <input type="number" value="<?= $cart['qty']; ?>" name="qty" min="1">
                <input type="hidden" name="upid" value="<?= $cart['pro_id']; ?>">
            </td>
            <td>
              <input type="submit" name="update" value="Update" class="btn btn-sm btn-primary">
              </form>
            </td>
            <td><a class="btn btn-sm btn-danger" href="removecartitem.php?id=<?= $cart['pro_id']; ?>">Remove</a></td>
          </tr>
      <?php
          $i++;
        endforeach;
      endif;
      ?>
    </tbody>
  </table>
</div>
<?php include 'footer.php'; ?>