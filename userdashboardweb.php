<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userdashboard.html</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

<body class="mx-0 p-0 mb-0 bg-dark border-0">
    <div class="container-fluid bg-dark text-light">
        <div class="row">
            <div class="col-12 mx-0" style="padding: auto;">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" style="font-family:'Fraunces', serif;" href="#">CYPHERS</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Accommodation
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#"> Apartments and Condos</a></li>
                                        <li><a class="dropdown-item" href="#">Backpacker’s Hostels</a></li>
                                        <li><a class="dropdown-item" href="#">B&B’s</a></li>
                                        <li><a class="dropdown-item" href="#">Holiday Homes</a></li>
                                        <li><a class="dropdown-item" href="#">Guest Houses</a></li>
                                        <li><a class="dropdown-item" href="#">Villas and Beach Houses</a></li>
                                        <li><a class="dropdown-item" href="#">Homestays</a></li>

                                    </ul>
                                </li>
                                <li class="nav-item ">
                                    <button class="btn bg-dark btn-primary border-0" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Account</button>
                                    <button type="button" class="btn bg-dark text-light" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"> login</button>
                                    <?php
                 include("userlogin.php");
                 ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row bg-dark text-light">
            <div class="col-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner " style="height:400px">
                        <div class="carousel-item active">
                            <img src="https://thumbs.dreamstime.com/z/hotel-bed-room-21064950.jpg"
                                class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption position-absolute top-0 ">
                                <h5>BED ROOMS</h5>
                                <p>Rooms, well furnished with nice views.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://thumbs.dreamstime.com/z/hotel-buffet-dining-restaurant-15016763.jpg"
                                class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption position-absolute top-0">
                                <h5>HOTELS</h5>
                                <a href="#">Feel new tastes with just a click</a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://thumbs.dreamstime.com/z/hotel-fine-dining-restaurant-17873534.jpg"
                                class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption position-absolute top-0  ">
                                <h5>Spacious Environments</h5>

                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row gx-0 bg-light">
            <div class=" gx-0 gy-5 col-lg-6 col-md-6 col-sm-6 mb-3 d-flex align-items-start text-dark bg-dark">
                <div class="card" style="width: 40rem;">
                    <img src="https://nationmedia.000webhostapp.com/family.jpg" class="img-fluid card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Family Tables</h5>
                        <p class="card-text">Bring with you your family and friends,enjoy the spacious meals we offer
                        </p>
                        <a href="#" class="btn btn-primary">Book Today</a>
                    </div>
                </div>
            </div>
            <div class="gy-5 px-4  col-lg-6 col-md-6 col-sm-6 mb-3 d-flex align-items-start text-dark bg-dark">
                <div class="card" style="width: 40rem;">
                    <img src="https://nationmedia.000webhostapp.com/convensionrooms.jpg" class="img-fluid  card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Conference Spaces</h5>
                        <p class="card-text">We offer the best serin environment for meetings and conferences</p>
                        <a href="#" class="btn btn-primary">Reserve a spot</a>
                    </div>
                </div>
            </div>
            <div class="gy-5 bg-dark   col-lg-12 col-md-12 col-sm-12 mb-3 d-flex align-items-start">
                <div class="card text-light bg-dark " style="width: 100rem;">
                    <div class="row">
                        <div class="col-lg-6 ">
                            <img src="https://nationmedia.000webhostapp.com/breakfast.jpg"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-lg-6">
                            <h3 class="card-header">Start the Day with a Powerful and Healthy Breakfast</h3>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text" style="font-family: 'Montserrat', sans-serif;">They say breakfast
                                    is the most important meal of the day, but it’s easy to get stuck in a breakfast
                                    rut. Sometimes you just need a few ideas to get the wheels turning.

                                    Here are more than 33 tasty and filling breakfast recipes for you to browse.
                                    We are sharing easy breakfast recipes in six categories:
                                </p>
                                <div class="list">
                                    <ul class="list-group">
                                        <li class="list-group-item">Breakfast Sandwiches</li>
                                        <li class="list-group-item">Egg Breakfasts</li>
                                        <li class="list-group-item">Sweet Breakfasts</li>
                                        <li class="list-group-item">Breakfast Breads</li>
                                        <li class="list-group-item">Grab-and-Go Breakfasts</li>
                                    </ul>
                                </div>
                                <div class="card-footer"> <a href="#" class="btn btn-primary">Book breakfast</a></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-dark text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f" style="color: blue;"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter" style="color: black;"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-instagram bg-dark"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3" "></i>CYPHERS
          </h6>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, blanditiis earum saepe, asperiores dicta ipsam deleniti a autem aperiam assumenda fuga porro beatae commodi temporibus molestias vitae culpa ea? At?
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class=" col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                    <!-- Links -->
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        Products
                                    </h6>
                                    <p>
                                        <a href="#!" class="text-reset">Meals</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Bed Rooms</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Conference Rooms</a>
                                    </p>
                                    <p>
                                        <a href="#!" class="text-reset">Gues Rooms</a>
                                    </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Pricing</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Booking</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Orders</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i> Kisumu,Maseno</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                lutalidavid44@gmail.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 254743457481</p>
                            <p><i class="fas fa-print me-3"></i> + 254708094933</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>


            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="#">cyphertech.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </div>//.container-fluid



    </div>//.container-fluid


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">UPDATE</h5>

                </div>
                <div class="modal-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname">
                        </div>
                        <div class="col-md-6">
                            <label for="secondname" class="form-label">Second Name</label>
                            <input type="text" class="form-control" id="secondname">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2"
                                placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="col-md-6">
                            <label for="inputTown" class="form-label">Town / City</label>
                            <input type="text" class="form-control" id="inputTown">
                        </div>
                        <div class="col-md-4">
                            <label for="inputStreet" class="form-label">Street</label>
                            <input type="text" class="form-control" id="inputStreet">
                        </div>
                        <div class="col-md-2">
                            <label for="inputZip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="col-5">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="phone" placeholder="+254">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">LOG OUT</button>
                    <button type="button" class="btn btn-primary position-absolute start-0">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="/jquery/jquery.js">

    </script>
    <script src="/jquery/js.js">
    </script>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="index.js">
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>
</body>

</html>