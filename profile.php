<div class="col-lg-3 col-md-3 col-sm-12">
    <div class="card shadow p-3 mb-5 bg-body ">
        <img src="./photos/jpeg.jpg" style="height:100px; width:100px" class="shadow-lg  mx-auto d-block rounded img-fluid" alt="...">
        <div class="card-body">

            <p class="card-text text-center align-content-center">
            <h4 class="text-center">

                <?php
                $name = "David";
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
    <form class="row g-3" style="height:20rem">
        <div class="col-lg-12">
            <h3>
                PERSONAL DETAILS-CLIENT
            </h3>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="firstname" class="form-label shadow-sm">First Name</label>
            <input type="text" class="form-control" id="firstname">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="secondname" class="form-label shadow-sm">Second Name</label>
            <input type="text" class="form-control" id="secondname">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputAddress" class="form-label shadow-sm">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputAddress2" class="form-label shadow-sm">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputTown" class="form-label shadow-sm">Town / City</label>
            <input type="text" class="form-control" id="inputTown">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputStreet" class="form-label shadow-sm">Street</label>
            <input type="text" class="form-control" id="inputStreet">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="inputZip" class="form-label shadow-sm">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <label for="phone" class="form-label shadow-sm">Phone Number</label>
            <input type="number" class="form-control" id="phone" placeholder="+254">
        </div>
        <div class="col-lg-12">
            <button type="submit" class="btn shadow-sm text-dark bg-primary">
                UPDATE
            </button>
        </div>
    </form>
</div>