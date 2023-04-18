<!-- <?php include 'header.php'; ?>
<?php
if(isset($_POST['save'])){
$status=$_POST['status'];
$username=$_POST['username'];
if ($status=="Approve") {

$sql = "UPDATE register SET status='$status' WHERE username='$username'";
if (mysqli_query($conn,$sql)) {
echo "User Approved";
  }
}
else{
$sql1 = "DELETE FROM register WHERE username='$username'";
if (mysqli_query($conn,$sql1)) {
echo "User Rejected";
  

  }        
      }

      }

  ?>

  <body>


    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!- ============================================================== -->
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
              <h4 class="page-title">COSTOMERS</h4>
            </div>
          </div>
        </div>
     
        <div class="container-fluid">
          
          <div class="row">
            <div class="col-12">
              
          
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Staff Details</h5>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>TRX ACCOUNT</th>
                          <th>Refrel</th>

                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                  $sql="SELECT * FROM register WHERE status='Pending'";
                  $rztl=mysqli_query($conn,$sql);
                  if ($rztl->num_rows>0) {
                   while ($row=mysqli_fetch_assoc($rztl)) {

                   ?>
                        <tr>
                    
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['contact'];?></td>
                          <td><?php echo $row['trx_acc'];?></td>
                          <td><?php echo $row['refrel'];?></td>
                          <td class="text-center">
                          <form action="" method="POST">
                            <select required name="status" >
                              <option>Please Select</option>
                              <option value="Approve">Approve</option>
                              <option value="Reject">Reject </option>
                            </select>
                            <button name="save" class="btn btn-primary mt-2">Save</button>
                            <!-- <input type="" name="id" value="<?php echo $row ['id']; ?>" hidden> -->
                            <input type="hidden" name="username" value="<?php echo $row['username']; ?>">

                          </form>
                            
                          </td>
                        </tr>
                       <?php } } ?> 
                       
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
        </div>
        
     <?php include 'footer.php';?>
     
         <?php include 'header.php'; ?>
<?php
if(isset($_POST['save'])){
  $status=$_POST['status'];
  $username=$_POST['username'];
  if ($status=="Approve") {
    $sql = "UPDATE register SET status='$status' WHERE username='$username'";
    if (mysqli_query($conn,$sql)) {
      // Insert the user's details into the "Approved" table
      $sql2 = "INSERT INTO approved (name, username, email, contact, trx_acc, refrel, refrel_points, password) SELECT name, username, email, contact, trx_acc, refrel, refrel_points, password FROM register WHERE username='$username'";
      mysqli_query($conn, $sql2);
      echo "User Approved";
    }
  }
  else{
    $sql1 = "DELETE FROM register WHERE username='$username'";
    if (mysqli_query($conn,$sql1)) {
      // Delete the user's details from the "Approved" table (in case they were previously approved)
      $sql3 = "DELETE FROM Approved WHERE username='$username'";
      mysqli_query($conn, $sql3);
      echo "User Rejected";
    }        
  }
}

?>

<body>
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
      <?php include 'navbar.php';?>
    </header>
    <?php include 'sidebar.php';?>
     <div class="page-wrapper">
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">CUSTOMERS</h4>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Staff Details</h5>
                <div class="table-responsive">
                  <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>TRX Account</th>
                        <th>Refrel Code</th>
                        <th>Transection ID</th>

                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    // Retrieve all customer data
                    $sql = "SELECT * FROM register";
                    $result = mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_assoc($result)){
                        $name = $row['name'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $contact = $row['contact'];
                        $trx_acc = $row['trx_acc'];
                        $refrel = $row['refrel'];
                  ?>
                        <tr>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $username; ?></td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo $contact; ?></td>
                          <td><?php echo $trx_acc; ?></td>
                          <td><?php echo $refrel; ?></td>
                          <td>
                            <form method="post">
                              <select name="status">
                                <option value="Approve">Approve</option>
                                <option value="Reject">Reject</option>
                              </select>
                              <input type="hidden" name="username" value="<?php echo $username; ?>">
                              <input type="submit" name="save" value="Save">
                            </form>
                          </td>
                        </tr>
                  <?php
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php';?>