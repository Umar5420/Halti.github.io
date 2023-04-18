<?php
include '../db.php';
 session_start();
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];


  
  $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1){
     $_SESSION['user']=123;

        ?>
     
        <script type="text/javascript">
          window.location.href='index.php';
        </script>
        <?php
  }else{
    echo "Invalid login credentials";
  }

  mysqli_close($conn);
}
?>


     
<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Umar Projects</title>

    <link
      rel="icon"type="image/png"sizes="16x16" href="assets/images/favicon.png"/>
   
    <link href="dist/css/style.min.css" rel="stylesheet" />
   
  </head>

  <body>
    <div class="main-wrapper">
      <div class="preloader">
        <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
        </div>
      </div>

      <div
        class="auth-wrapper  d-flex no-block justify-content-center align-items-center bg-dark " >
        <div class="auth-box bg-dark border-top border-secondary">
          <div id="loginform">
            <div class="text-center pt-3 ">
              <span class="db"><h2 style="color: white;">Lunch Time </h2></span>
            </div>
            <!-- Form -->
            <form class="form-horizontal mt-3"id="loginform" method="post" action="" >
              <div class="row pb-4">
                <div class="col-12">
             <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text bg-danger text-white h-100"
                      id="basic-addon1"
                      ><i class="mdi mdi-email fs-4"></i
                    ></span>
                  </div><input type="text"class="form-control form-control-lg"placeholder="Email Address"aria-label="Username"aria-describedby="basic-addon1" name="email" />
                </div>

                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text bg-warning text-white h-100"
                        id="basic-addon2"
                        ><i class="mdi mdi-lock fs-4"></i
                      ></span>
                    </div>
                    <input type="text"class="form-control form-control-lg" placeholder="Password"aria-label="Password" aria-describedby="basic-addon1"required="" name="password" />
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-12">
                  <div class="form-group">
                    <div class="pt-3">
                      <a href="forgot.php">
                      <button
                        class="btn btn-info" type="button"  >
                        <i class="mdi mdi-lock fs-4 me-1"></i> forget password?
                      </button>
                      </a>
                      <button class="btn btn-success float-end text-white"type="submit" name="submit" >
                        Login
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
       
          </div>
        </div>
      </div>
 
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script>
      $(".preloader").fadeOut();

      $("#to-recover").on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
      });
      $("#to-login").click(function () {
        $("#recoverform").hide();
        $("#loginform").fadeIn();
      });
    </script>
  </body>
</html>
