<div class="card rounded-start col position-absolute top-50 start-50 translate-middle w-50">
        <div>
          <h1 class="text-center" style="font-family:'Fraunces', serif;">
            User Sign up
          </h1>
        </div>  
        <form name="form" class="needs-validation" novalidate method="post" action="php/filterManagerRegData.php">
          <div class="mb-4">
            <label for="InputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="InputEmail" aria-describedby="emailHelp"> 
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-4">
            <label for="Password1" class="form-label">Password</label>
            <input type="password" class="form-control" name="Password1" >
            <div id="password1" class="form-text">Protect your account.</div>
          </div>
          <div class="mb-4">
            <label for="Password2" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="Password2">
            <div id="password2" class="form-text">Protect your account.</div>

          </div>
          <div class="mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button  onclick="setTimeout(validate(),999)" type="submit" class="btn btn-primary position-absolute bottom-0 end-0 m-3 text-center" style="padding-right: 5%; padding-left: 5%;">Submit</button>
        </form>
        <div id="addme" class="alert alert-warning alert-dismissible fade show" role="alert" style="visibility:hidden;">
            <strong>Holy guacamole!</strong> You should check in on some of those fields below.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
 