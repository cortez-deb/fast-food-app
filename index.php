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

<body class="mx-0 p-0 mb-0 border-0">
<?php
include 'login.inc.php';
  // Check if product is coming or not
  if (isset($_GET['pro_id'])) {

    $proid = $_GET['pro_id'];

    // If session cart is not empty
    if (!empty($_SESSION['cart'])) {

      // Using "array_column() function" we get the product id existing in session cart array
      $acol = array_column($_SESSION['cart'], 'pro_id');

      // now we compare whther id already exist with "in_array() function"
      if (in_array($proid, $acol)) {
       

        // Updating quantity if item already exist
        $_SESSION['cart'][$proid]['qty'] += 1;
      } else {
        // If item doesn't exist in session cart array, we add a new item
        $item = [
          'pro_id' => $_GET['pro_id'],
          'qty' => 1
        ];

        $_SESSION['cart'][$proid] = $item;
        
      }
    } else {
      // If cart is completely empty, then store item in session cart
      $item = [
        'pro_id' => $_GET['pro_id'],
        'qty' => 1
      ];

      $_SESSION['cart'][$proid] = $item;
     

    }
  }

  ?>
  
  <div class="container-fluid">
    <div class="row align-items-start">
      <?php
      include("navigation.php");
        // Get the 4 most recently added products
  $stmt = $pdo->prepare('SELECT * FROM meal ORDER BY price');
  $stmt->execute();
  $products_by_price = $stmt->fetchAll(PDO::FETCH_ASSOC);

      ?>
    </div>
    <div class="row align-items-start">
      <div class="d-flex col">
        <a class="btn btn-outline-success"  href="router.php?page=cart">Cart
          <?php if (isset($_SESSION['cart'])) : ?>
            <?php echo count($_SESSION['cart']);; ?>
          <?php endif; ?>
        </a>
      </div>
    </div>
    <div class="row align-items-start">
    <?php foreach ($products_by_price as $product) : ?>
      
      <div class="col mb-2  mt-2 m-0 g-0">
          <div class="card" style="width: 18rem;">
              <img src="photos/<?= $product['image'] ?>" class="card-img-top" style="height: 200px;">

              <div class="card-body">
                <h5 class="card-title"><?= $product['name'] ?></h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore excepturi quam quia quo alias iste magni et.</p>
                <p class="align-items-center">
                <h4  class="text-dark">Ksh.<?= $product['price'] ?></h4>
                <a href="router.php?page=index& pro_id=<?= $product['meal_ID']?>" class="btn btn-success">Add to Cart</a>
                </p>
              </div>
          </div>
        
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  </div>
  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src="js/bootstrap.bundle.js">
  var myModal = document.getElementById('myModal')
  var myInput = document.getElementById('myInput')

  myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
  })

  </script>
</body>

</html>