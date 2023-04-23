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
    </style>
</head>
<?php
include 'login.inc.php';
include("DeliverNavigation.php");

?>

<body class="mx-0 p-0 mb-0 border-0">
    <div class="container-fluid g-0">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 card shadow p-3 mb-5 bg-body">
                <?php
                if (isset($_GET['email'])) {
                    $name = $_GET['email'];

                    try {
                        $userdataQuery = $pdo->query("SELECT * FROM user WHERE email='{$name}';");
                        $userData = $userdataQuery->fetch(PDO::FETCH_ASSOC);
                        $image = $userData['image'];
                    } catch (PDOException $e) {
                    }
                }

                ?>
                <img src="/profile/<?php echo $image; ?>" style="height:10rem" class="shadow-lg card image  rounded" alt="...">
                <div class="card-body">

                    <p class="card-text text-center align-items-center">
                    <h4 class="text-center">

                        <?php
                        echo $name;
                        ?>
                        <br>
                        <?php
                        $access = $_SESSION['access'];
                        if ($access == 1) {
                            echo "Admin";
                        } elseif ($access == 2) {
                            echo "User";
                        } elseif ($access == 3) {
                            echo "Deliverer";
                        }
                        ?>
                    </h4>


                    </p>

                </div>
            </div>
            <div class="col">
                <table class="table table-striped table-striped m-4">
                    <h3 class="h3">Customer Location Information</h3>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Street</th>
                            <td>Zip</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $userdataQuery = $pdo->query("SELECT * FROM user WHERE email='{$name}';");
                            $userData = $userdataQuery->fetch(PDO::FETCH_ASSOC);
                        } catch (PDOException $e) {
                        } ?>
                        <tr>
                            <td><?= $userData['firstname']; ?></td>
                            <td><?= $userData['lastname']; ?> </td>
                            <td><?= $userData['address1']; ?></td>
                            <td><?= $userData['street']; ?></td>
                            <td><?= $userData['zip']; ?></td>
                        </tr>

                    </tbody>
                </table>
                <table class="table table-striped table-striped m-4">
                    <h3 class="h3">Customer Oder Details</h3>
                    <thead>
                        <tr>
                            <th>Oder ID</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Not Able to complete?</th>
                            <td>Submit</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['email'])) {
                            $id = $_GET['oder'];
                            try {
                                $dataQuery = $pdo->query("SELECT * FROM oders WHERE oderID='{$id}';");
                                $Data = $dataQuery->fetch(PDO::FETCH_ASSOC);
                            } catch (PDOException $e) {
                            }
                        } ?>
                        <tr>
                            <td><?= $Data['oderID']; ?></td>
                            <td><?= $Data['amount']; ?> </td>
                            <td><?= $Data['price']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <div class="col-4">
                                        <select name="action" id="destination" class="col">

                                            <option value="1">Declined by customer</option>
                                            <option value="2">Custmer Not Found</option>
                                            <option value="3">Destroyed</option>
                                            <option value="4">Other</option>
                                        </select>
                                    </div>
                            </td>
                            <td>
                                <input type="submit" name="submit"  class="btn btn-danger" value="feedback">
                                </form>
                            </td>

                        </tr>

                    </tbody>
                </table>

            </div>

        </div>
        <div class="row">
            <footer class="col-12 ">
                <?php
                include("footer.php");
                ?>
            </footer>
        </div>
    </div>
</body>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

<script src="/js/bootstrap.bundle.js"></script>
<script src="index.js">
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>
</body>

</html>