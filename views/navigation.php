<nav class="nav nav-pills nav-fill shadow-sm">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="nav-link" href="router.php?page=dashboard">
    <h3 class="h3">Profile</h3>
  </a>
  <a class="nav-link" href="router.php?page=reciepts">
    <h3 class="h3">Recipts</h3>
  </a>
  <a class="nav-link" href="router.php?page=index">
    <h3 class="h3">Meal</h3>
  </a>

  <a class="nav-link" href="router.php?page=cart">
    <h3 class="h3">Cart</h3>
    <?php if (isset($_SESSION['cart'])) : ?>
      <?php echo count($_SESSION['cart']);; ?>
    <?php endif; ?>
  </a>
  <a class="nav-link" href="router.php?page=userOders">
    <h3 class="h3">Oders</h3>
  </a>
  <a class="btn btn-primary active m-2" href="router.php?page=logout">LOGOUT</a>

</nav>
<script src="/js/bootstrap.bundle.js"></script>
