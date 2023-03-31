<?php
include 'profiler.php';

?>
<div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card shadow p-3 mb-5 bg-body ">
<?php
               
               $name =$_SESSION['email'];
                try{
                    $userdataQuery = $pdo->query("SELECT * FROM user WHERE email='{$name}';");
                    $userData = $userdataQuery->fetch(PDO::FETCH_ASSOC);
                    $image=$userData['image'];

                }catch(PDOException $e){

                }
?>
    <img src="/profile/<?php echo $image;?>" style="height:10rem" class="shadow-lg card-img-top  rounded" alt="...">
        <div class="card-body">

            <p class="card-text text-center align-items-center">
            <h4 class="text-center">

                <?php

                
                echo $name;
                ?>
                <br>
                <?php
                $access=$_SESSION['access'];
                if($access==1){
                    echo "Admin";
                }
                elseif($access==2){
                    echo "User";
                }
                elseif($access==3){
                    echo"Deliverer";
                }

                ?>
               
            </h4>

            
            </p>
            <form class="mb-3" action="profile_image_update.php" method="post" enctype="multipart/form-data">
                <input type="file" name="image" id="image">
                <input type="submit" name="Submit" value="Submit" class="mt-4 btn shadow-sm text-dark bg-primary">
            </form>
        </div>
    </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-12">
    <form class="row g-3" style="height:20rem" action="" method="POST">
        <div class="col-lg-12">
            <h3>
                PERSONAL DETAILS-CLIENT
            
            </h3>
            <?php echo $success; ?><?php echo $missingdetails ?>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="firstname" class="form-label shadow-sm">First Name</label>
            <input type="text" class="form-control" name="firstname" placeholder="<?php echo $firstname ?>">
            <?php echo $firstNameEmpty ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="secondname" class="form-label shadow-sm">Second Name :</label>
            <input type="text" class="form-control" name="lastname"  placeholder="<?php echo $secondname ?>">
            <?php echo $secondNameEmpty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputAddress" class="form-label shadow-sm">Address</label>
            <input type="text" class="form-control" name="address1" placeholder="<?php echo $address1 ?>">
            <?php echo $address1Empty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputAddress2" class="form-label shadow-sm">Address 2</label>
            <input type="text" class="form-control" name="address2" placeholder="<?php echo $address2 ?>">
            <?php echo $address2Empty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputTown" class="form-label shadow-sm">Town / City</label>
            <input type="text" class="form-control" name="town" placeholder="<?php echo $town ?>">
            <?php echo $townEmpty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputStreet" class="form-label shadow-sm">Street</label>
            <input type="text" class="form-control" name="street"  placeholder="<?php echo $street ?>">
            <?php echo $streetEmpty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputZip" class="form-label shadow-sm">Zip</label>
            <input type="text" class="form-control" name="zip"  placeholder="<?php echo $zip ?>">
            <?php echo $zipEmpty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="phone" class="form-label shadow-sm">Phone Number</label>
            <input type="number" class="form-control" name="phone" placeholder="<?php echo $phone?>">
            <?php echo $phoneEmpty ?>
        </div>
        <div class="col-lg-12">
            <input type="submit" name="Submit" value="Submit" class="btn shadow-sm text-dark bg-primary">
            </input>
        </div>
    </form>
</div>