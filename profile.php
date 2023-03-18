<?php
include 'profiler.php';
?>
<div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card shadow p-3 mb-5 bg-body ">
        <img src="./photos/jpeg.jpg" style="height:100px; width:100px" class="shadow-lg  mx-auto d-block rounded img-fluid" alt="...">
        <div class="card-body">

            <p class="card-text text-center align-items-center">
            <h4 class="text-center">

                <?php
                $name =$_SESSION['email'];
                $ClientType = "Client";

                echo $name;
                ?>
                <br>
                <?php
                echo $ClientType;

                ?>
               
            </h4>
            <a type="button" href="router.php?page=logout" class="btn btn-primary position-relative end-0">LogOut</a>
            </p>
        </div>
    </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-12">
    <form class="row g-3" style="height:20rem" action="" method="POST">
        <div class="col-lg-12">
            <h3>
                PERSONAL DETAILS-CLIENT
            
            </h3>
            <?php echo $success ?>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="firstname" class="form-label shadow-sm">First Name</label>
            <input type="text" class="form-control" name="firstname">
            <?php echo $firstNameEmpty ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="secondname" class="form-label shadow-sm">Second Name</label>
            <input type="text" class="form-control" name="lastname">
            <?php echo $secondNameEmpty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputAddress" class="form-label shadow-sm">Address</label>
            <input type="text" class="form-control" name="address1" placeholder="1234 Main St">
            <?php echo $address1Empty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputAddress2" class="form-label shadow-sm">Address 2</label>
            <input type="text" class="form-control" name="address2" placeholder="Apartment, studio, or floor">
            <?php echo $address2Empty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputTown" class="form-label shadow-sm">Town / City</label>
            <input type="text" class="form-control" name="town">
            <?php echo $townEmpty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputStreet" class="form-label shadow-sm">Street</label>
            <input type="text" class="form-control" name="street">
            <?php echo $streetEmpty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputZip" class="form-label shadow-sm">Zip</label>
            <input type="text" class="form-control" name="zip">
            <?php echo $zipEmpty?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="phone" class="form-label shadow-sm">Phone Number</label>
            <input type="number" class="form-control" name="phone" placeholder="+254">
            <?php echo $phoneEmpty ?>
        </div>
        <div class="col-lg-12">
            <input type="submit" name="Submit" value="Submit" class="btn shadow-sm text-dark bg-primary">
            </input>
        </div>
    </form>
</div>