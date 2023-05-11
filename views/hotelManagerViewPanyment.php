<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>./dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="sidebar.css">
    </style>
</head>

<body class="mx-lg-0 mx-md-0 mx-xl-0 p-0 mb-0  border-0">


    <div class="container-fluid">
        <div class="row">
            <?php
            include("hotelmanagernavigation.php");
            ?>
            <div class="col-12 text-lighten-1">

                <h3>FILTER YOUR SEARCH</h3>
                <form action="hotelrouter.php?page=hotelManagerViewPanyment" method="POST">
                    <div class="row g-3">
                        <div class="col-4">
                           <div class="row">
                           <label for="filter" class="form-label col text-center">
                                SEARCH BY:
                            </label>
                            <select name="filters" id="filters" class="form-control col">
                                <option value="mpesacode">Mpesa Code</option>
                                <option value="mealID">Meal ID</option>
                                <option value="OderID">Oder ID</option>
                                <option value="email" selected>Customer Mail</option>
                            </select>
                           </div>
                        </div>
                        <div class="col-8">
                            <div class="row">
                            <label for="key" class="form-label col text-center">SEARCH KEY</label>
                            <input type="text" name="key" id="" required placeholder="Type search key" class="form-control col">
                            <input type="submit" name="submit" value="search" class="form-control col mx-3 small">
                            <a href="#" class="form-control col mx-3 small link-danger text-decoration-none">Clear Filters</a>    
                        </div>
                        </div>
                    </div>

                </form>
                <?php
                $responce;
                if(isset($_POST['submit'])){
                    $filter= $_POST['filters'];
                    $key = htmlspecialchars($_POST['key']);
                    if(!empty($filter) && !empty($key)){
                        if($filter=="mpesacode"){
                            $stmt = $pdo->prepare("SELECT * FROM payment where mpesacode='{$key}';");
                            $stmt->execute();
                            $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($stmt && !empty($payments)) {
                                foreach ($payments as $dt) :
                                    $mpesacode =  $dt['mpesacode'];
                                    $mealID = $dt['meal_ID'];
                                    $oderid = $dt['oderId'];
                                    $amount = $dt['amount'];
                                    $customer = $dt['payedBy'];
                                endforeach;
                            }else{
                              $responce= '<span  class="alert alert-danger alert-dismissible"  role="alert">Sorry No search Mpesa code  in payments</span>'; 
                            }
                        }
                        elseif($filter=="mealID"){

                            $stmt = $pdo->prepare("SELECT * FROM payment where meal_ID='{$key}' and meal_ID !=0;");
                            $stmt->execute();
                            $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($stmt && !empty($payments)) {
                                foreach ($payments as $dt) :
                                    $mpesacode =  $dt['mpesacode'];
                                    $mealID = $dt['meal_ID'];
                                    $oderid = $dt['oderId'];
                                    $amount = $dt['amount'];
                                    $customer = $dt['payedBy'];
                                endforeach;
                            }else{
                                $responce= '<span  class="alert alert-danger alert-dismissible text-capitalize"  role="alert">Sorry No such Meal ID in payments</span>';     
     
                            }

                        }
                        elseif($filter=="OderID"){
                            
                            $stmt = $pdo->prepare("SELECT * FROM payment where oderId='{$key}' and oderId !=0;");
                            $stmt->execute();
                            $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($stmt && !empty($payments)) {
                                foreach ($payments as $dt) :
                                    $mpesacode =  $dt['mpesacode'];
                                    $mealID = $dt['meal_ID'];
                                    $oderid = $dt['oderId'];
                                    $amount = $dt['amount'];
                                    $customer = $dt['payedBy'];
                                endforeach;
                            }else{
                                $responce= '<span  class="alert alert-danger alert-dismissible text-capitalize"  role="alert">Sorry No such Oder ID in payments</span>';          
                            }
                            
                        }
                        elseif($filter=="email"){
                            
                            $stmt = $pdo->prepare("SELECT * FROM payment where payedBy='{$key}';");
                            $stmt->execute();
                            $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if ($stmt && !empty($payments)) {
                                foreach ($payments as $dt) :
                                    $mpesacode =  $dt['mpesacode'];
                                    $mealID = $dt['meal_ID'];
                                    $oderid = $dt['oderId'];
                                    $amount = $dt['amount'];
                                    $customer = $dt['payedBy'];
                                endforeach;
                            }else{
                                $responce= '<span  class="alert alert-danger alert-dismissible text-capitalize"  role="alert">Sorry No Such Email in payments</span>';     
                            }
                            
                        }
                        else{
                            $responce= '<span  class="alert alert-danger alert-dismissible text-capitalize"  role="alert">Search Criteria Not Found</span>';     
   
                        }
                    }
                }else{
                $stmt = $pdo->prepare('SELECT * FROM payment');
                $stmt->execute();
                $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                ?>


            </div>
        </div>

        <div class="row align-items-start">
            <table class="table table-striped table-striped">
                <thead>
                    <tr>
                        <th scope="col">Mpesa Code</th>
                        <th scope="col">Meal ID</th>
                        <th scope="col">oder ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Customer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($responce)){
                            echo $responce;
                        }

                    if ($stmt && !empty($payments)) {
                        foreach ($payments as $dt) : ?>
                            <tr>

                                <td><?= $dt['mpesacode']; ?></td>
                                <td><?= $dt['meal_ID']; ?></td>
                                <td><?= $dt['oderId']; ?></td>
                                <td><?= $dt['amount']; ?></td>
                                <td><?= $dt['payedBy']; ?></td>
                            </tr>
                    <?php endforeach;
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <footer class="col-12 ">
                <?php
                include("footer.php");
                ?>
            </footer>
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

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