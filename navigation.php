<div class="shadow-sm col-12">
  <div class="row">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="collapse navbar-collapse container" id="navbarNav">
          <ul class="navbar-nav row">
            <li class="nav-item col-2">
              <a class="nav-link active" href="router.php?page=dashboard">Profile</a>
            </li>
            <li class="nav-item col-2">
              <a class="nav-link active" href="#">Recipts</a>
            </li>
            <li class="nav-item col-2">
              <a class="nav-link active" href="router.php?page=index">Meals</a>

            </li>
            <li class="nav-item col-2">

              <a class="nav-link active" href="router.php?page=cart">Cart
                <?php if (isset($_SESSION['cart'])) : ?>
                  <?php echo count($_SESSION['cart']);; ?>
                <?php endif; ?>
              </a>
            </li>
            <li class="nav-item col-2">
              <a class="nav-link active" href="router.php?page=userOders">Oders</a>

            </li>
            <li class="nav-item col-2">
              <a class="btn btn-primary active" href="router.php?page=logout">LOGOUT</a>

            </li>

          </ul>
        </div>


      </div>

    </nav>
  </div>


</div>
<script src="/js/bootstrap.bundle.js"></script>