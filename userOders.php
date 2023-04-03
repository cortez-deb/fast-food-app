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
                include("navigation.php");
                ?>

            </div>
        </div>
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                            <?php
                            $user = $_SESSION['email'];
                            $pdo = pdo_connect_mysql();
                            $stmt = $pdo->prepare("SELECT * FROM `oders` WHERE  email='{$user}'");
                            $stmt->execute();
                            $Data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($Data as $freight) :
                                $mealID =  $freight['mealID'];
                                $oderID=$freight['oderID'];
                            endforeach;
                            $stmt = $pdo->prepare("SELECT * FROM `meal` WHERE  meal_ID='{$mealID}'");
                            $stmt->execute();
                            $Name = $stmt->fetch(PDO::FETCH_ASSOC);

                            ?>
                            <?php foreach ($Data as $freight) : ?>

                                <div class="card col-lg-3 col-md-5 col-sm-12 m-4" style="max-width: 500px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="./photos/<?=  $Name["image"]?>" class="img-fluid rounded-start mt-3 col-sm-12 col-12" style="height:10rem" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $Name["name"]?></h5>
                                                <p class="card-text mb-0">Meal Short Description</p>
                                                <p class="card-text mb-0"> Oder Anount:
                                                    <?= $freight["amount"] ?>
                                                </p>                                                
                                                <p class="card-text mb-0">Payed Anount: Ksh.
                                                    <?= $freight["price"] ?>
                                                </p>
                                                <div class="btn btn-primary text-center col-12">
                                                   <a href="router.php?page=usercanceloder.php& oderID=<?= $oderID ?>">Cancel Oder</a>
                                                </div>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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