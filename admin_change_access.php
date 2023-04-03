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
                <?php include 'adminnavigation.php';

                ?>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <table class="table table-primary table-hover">
                        <?php
                                         if (isset($_GET['reply'])) {
                                            $messege=$_GET['reply'];
                                            echo $messege;
                                         }
                         ?>
                        <thead>
                            <tr>
                                <th>
                                    User Id
                                </th>
                                <th>
                                    First Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Current Access
                                </th> 
                                <th>
                                    Change Access
                                </th>  
                                <th>
                                    Action
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $pdo = pdo_connect_mysql();
                            $stmt = $pdo->prepare('SELECT * FROM user');
                            $stmt->execute();
                            $Data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            ?>
                            <?php foreach ($Data as $freight) : ?>
                                <tr>
                                    <td>
                                        <?= $freight['user_ID'] ?>
                                    </td>
                                    <td>
                                        <?= $freight['firstname'] ?>
                                    </td>
                                    <td>
                                        <?= $freight['email'] ?>
                                    </td>
                                    <td>
                                        <?= $freight['phone'] ?>
                                    </td>
                                    <td>
                                        <?= $freight['address1'] ?>
                                    </td>                                   
                                     <td>
                                        <?php
                                        $access;
                                        if($freight['access'] ==1){
                                            $access="Admin"; 
                                        }
                                        elseif($freight['access'] ==2){
                                            $access="user";
                                        }elseif($freight['access'] ==3){
                                            $access="deliverer";
                                        }
                                        ?>
                                        <?= $access ?>
                                    </td>
                                    <td>
                                        <form action="deliverRouter.php?page=admin_change_access_db& user=<?= $freight['email'] ?>" method="post">
                                            <div class="col-4">
                                                <select name="action" id="destination">

                                                    <option value="1">Admin</option>
                                                    <option value="2">User</option>
                                                    <option value="3">Deliver</option>
                                                    <option value="delete">Delete</option>

                                                </select>
                                            </div>
                                    </td>
                                    <td>
                                        <input type="submit" name="submit" value="change">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <?php include 'footer.php'; ?>
            </div>
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