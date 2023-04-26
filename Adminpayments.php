
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
            <div class="col-12">
               
                    <?php
                    include("adminnavigation.php");
                    ?>
                
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    
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
                        $stmt = $pdo->prepare('SELECT * FROM payment');
                        $stmt->execute();
                        $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
                </div>
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