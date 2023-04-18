<?php include 'header.php';?>



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
              <h4 class="page-title">Staff</h4>
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
                          <th>User Id</th>
                          <th>Poster Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Location</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                  <?php 
                  $sql="SELECT * FROM events WHERE status='Approve'";
                  $rztl=mysqli_query($conn,$sql);
                  if ($rztl->num_rows>0) {
                   while ($row=mysqli_fetch_assoc($rztl)) {

                   ?>
                        <tr>
                          <td><?php echo $row['user_id'];?></td>
                          <td><?php echo $row['poster_title'];?></td>
                          <td><?php echo $row['category'];?></td>
                          <td><?php echo $row['date'];?></td>
                          <td><?php echo $row['location'];?></td>
                          <td><?php echo $row['detail'];?></td>
                           <td><?php echo $row['detail'];?></td>
                          <td class="text-center">
                        <form action="" method="POST">
                            
                        <button name="Delete" class="btn btn-primary mt-2">Delete</button>
                            <input type="" name="id" value="<?php echo $row ['id']; ?>" hidden>
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
        