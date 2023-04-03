<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="sidebar.css">
    </style>
</head>


<body class="align-content-center">
    <div class="container-fluid position-relative align-content-center">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12"></div>

            <div class="card col-lg-4 col-md-4 col-sm-12 mt-5">
                
                <div class="card-body">
                    <h2 class="card-title text-center">LOGIN</h2>
                    <p class="card-text">Please login to continue</p>
                    <?php include'logindb.php'; ?>
                    <?php echo $credentialserror ?>
                    <?php  $messege?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="" name="email" aria-describedby="emailHelp">
                            <?php echo $emailEmptyerror?>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                           
                        </div>
                        <div class="mb-3">
                            <label for=""  class="form-label">Password</label>
                            <input type="password" class="form-control" id="" name="password">
                            <?php echo $passwordEmptyerror?>
                        </div>
                        <div class="mb-3 form-check">
                        <p class="card-text">Don't have an account?    <a href="signup.php" class="card-link">Sign up?</p>
                        <a href="#" class="card-link">Forgot password?</a>

                        </div>
                        
                        <input type="submit" name="Submit" value="Submit" class="btn btn-primary text-center col-12 "/>                        
                        
                    </form>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12"></div>

        </div>
    </div>
</body>

</html>