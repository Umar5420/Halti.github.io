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
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" integrity="sha512-9YHSK59/rjvhtDcY/b+4rdnl0V4LPDWdkKceBl8ZLF5TB6745ml1AfluEU6dFWqwDw9lPvnauxFgpKvJqp7jiQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/fontawesome.min.js" integrity="sha512-c41hNYfKMuxafVVmh5X3N/8DiGFFAV/tU2oeNk+upk/dfDAdcbx5FrjFOkFhe4MOLaKlujjkyR4Yn7vImrXjzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
        <a href="#">Hello</a>
      </li>
    </ul> -->
  </div>
  <a class="navbar-brand" href="profile.php">My Profile</a>
  <a class="navbar-brand" href="withdraw_rec.php">Withdraw Slip</a>
</nav>
<div class="container mt-5">
    <div class="my_profile text-center fw-bolder fs-1 text-black-50">My Profile</div>
    <div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <div class="card shadow-sm mt-5">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0 "><i class="far fa-clone pr-1"></i>My Information</h3>
          </div>
          <div class="card-body pt-0">
          <?php
// Replace the values below with your database credentials
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "halti";

// Replace the value below with the username of the currently logged in user
// $current_username = $_SESSION['username'];
// Start the session at the beginning of your script
session_start();
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];

  // Create connection
  include "database.php";

  // Query to retrieve the data for the currently logged in user from the "w_done" table
  $sql = "SELECT name, username, email, contact, trx_acc, password FROM approved WHERE username='$username'";

  $result = $conn->query($sql);

  // Check if any rows were returned
  if ($result->num_rows > 0) {
      // Start creating the HTML table
      echo '<table class="table table-bordered">';
      // Loop through the rows of data (there should only be one row since we're querying for a single user)
      $row = $result->fetch_assoc();
      // Output the data for each column in the row
      echo '<tr><th width="30%">Name</th><td width="2%">:</td><td>' . $row["name"] . '</td></tr>';
      echo '<tr><th width="30%">Username</th><td width="2%">:</td><td>' . $row["username"] . '</td></tr>';
      echo '<tr><th width="30%">Email</th><td width="2%">:</td><td>' . $row["email"] . '</td></tr>';
      echo '<tr><th width="30%">Contact</th><td width="2%">:</td><td>' . $row["contact"] . '</td></tr>';
      echo '<tr><th width="30%">TRX_Account</th><td width="2%">:</td><td>' . $row["trx_acc"] . '</td></tr>';
      echo '<tr><th width="30%">Password</th><td width="2%">:</td><td>' . $row["password"] . '</td></tr>';
      // End the HTML table
      echo '</table>';
  } else {
      echo "No data found for this user.";
  }
  $conn->close();
} else {
  header("Location: login.php");
  exit();
}
?>


            <!-- <table class="table table-bordered">
              <tr>
                <th width="30%">Name</th>
                <td width="2%">:</td>
                <td></td>
              </tr>
              <tr>
                <th width="30%">Username	</th>
                <td width="2%">:</td>
                <td>2020</td>
              </tr>
              <tr>
                <th width="30%">Email</th>
                <td width="2%">:</td>
                <td>Male</td>
              </tr>
              <tr>
                <th width="30%">Contact</th>
                <td width="2%">:</td>
                <td>Group</td>
              </tr>
              <tr>
                <th width="30%">TRX_Account</th>
                <td width="2%">:</td>
                <td>B+</td>
              </tr>
              <tr>
                <th width="30%">Password</th>
                <td width="2%">:</td>
                <td>B+</td>
              </tr>
            </table> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

</body>
</html>