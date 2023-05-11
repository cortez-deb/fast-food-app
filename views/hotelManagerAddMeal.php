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
                include("hotelmanagernavigation.php");
                ?>

            </div>
        </div>
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12"></div>
                    <div class="col-6 col-lg-6 col-md-6 col-12 mt-5 text-center shadow m-2">
                        <h3>Add a Meal</h3>
                            <div class="col">
                                
                        <?php include "hotelManagerAddMealdb.php";
                       ?>
                            </div>
                            
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <?=$added?>
                                <label for="name" class="col-sm-2 col-form-label">Meal name</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <?php echo $emptyName ?>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col">
                                    <input class="form-control" name="description" placeholder="Please use a short description ">
                                </div>
                                <?php echo $emptyDescription ?>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Price</label>
                                <div class="col input-group">
                                    <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" id="price" name="price">
                                    <span class="input-group-text border-end-0">$</span>
                                    <span class="input-group-text border-start-0">0.00</span>
                                </div>
                                <?php echo $emptyprice ?>
                            </div>


                            <div class="row mb-3">
                                <label for="name" class="col-2 col-form-label">Meal Image </label>

                                <input type="file" name="image" id="image" class="bg-light col-10 border ">

                            </div>
                            <?php echo $image ?>
                            <input type="submit" value="Submit" name="Submit" class="col-12 btn btn-primary mb-3">

                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12"></div>
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