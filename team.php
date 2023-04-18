<?php
    include 'database.php';

    session_start();
    
    // Check if the user is already logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to the login page
        header('Location: login.php');
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Blockchain</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">ESOM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <?php if(isset($_SESSION['username'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
    <div class="container">
    <?php
include 'database.php';

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];

  $query = "SELECT refrel, refrel_points FROM approved WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die(mysqli_error($conn));
  }

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='text-center light fw-bolder mt-5'><h1> My Refrel Number <br>" . $row['refrel'] . "</h1></div>";
    echo "<div class='text-center light fw-lighter fs-6'><p> My Refrel Points <br> " . $row['refrel_points'] . "</p></div>";
    echo "<h2>
    Your Refrel Code Is Here:
    <span style='color:Blue;'>index.php?refer=$row[refrel] </span>
    </h2>";

  }
}
?>
       
    </div>

    <?php 
    if (isset($_GET['refrel']) && $_GET['refrel']!='') {
        if (!(isset($_SESSION['use rname']) && $_SESSION['username']==true)) {
            
            $me="SELECT * FROM approved WHERE refrel='$_GET[refrel]'";
            $rslt=mysqli_query($conn,$me);
            if (mysqli_num_rows($rslt)==1) {
                echo "<script>
                document.getElementById('refrel').value='$_GET[refrel]';
                </script>";
            }
        }
    }
?>


</body>
</html>