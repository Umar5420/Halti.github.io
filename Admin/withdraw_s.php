<?php include 'header.php';?>

<?php 
    if (isset($_POST['submit'])) {
        $date = $_POST['date'];
        $amount = $_POST['amount'];
        $account_no = $_POST['account_no'];
        $username = $_POST['username'];
      
        // Check if the user with the provided email and name already exists in the database
        $query = "INSERT INTO `w_done`( `date`, `amount`, `account_no`, `username`) VALUES ('$date', '$amount', '$account_no', '$username')";
        mysqli_query($conn, $query);
      }
      ?>



?>


  <body>
   
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>

    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
   <?php include 'navbar.php';?>
       
      </header>
     <?php include 'sidebar.php';?>
     
     
      <div class="page-wrapper">

        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Users</h4>
            </div>
          </div>
        </div>
     
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-12">
              
          
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Withdraw Slips</h5>
                  <div class="table-responsive">
                               <table
                      id="zero_config"
                      class="table table-striped table-bordered">
                      <form action="" method="POST">
    <p>
    <Label>Date :</Label>
    <input type="date" id="username" name="date" placeholder="Date" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <label for="">Amount :</label>
    <input type="text" id="" name="amount" placeholder="Amount" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <label for="">Destination Wallet :</label>
    <input type="text" id="email" name="account_no" placeholder="Destination Wallet" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <label for="">Username :</label>
    <input type="text" id="email" name="username" placeholder="Destination Wallet" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="submit" id="login" name="submit" value="Submit">
    </p>
  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
        </div>
        
     <?php include 'footer.php';?>
