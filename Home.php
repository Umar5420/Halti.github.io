<?php
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header('Location: login.php');
    exit();
}

// Check if the user clicked the logout button
if (isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

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
    <ul class="navbar-nav">
      <?php if(isset($_SESSION['username'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<div class="container mt-5">
<?php
include 'database.php';

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];

  $query = "SELECT name, trx_acc FROM approved WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die(mysqli_error($conn));
  }

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='text-center light fw-bolder'><h1>" . $row['name'] . "</h1></div>";
    echo "<div class='text-center light fw-lighter fs-6'><p>" . $row['trx_acc'] . "</p></div>";
  }
}
?>

  <div class="floot justify-content-center" style="width:500px; padding-left: 35px;
  position: relative; margin:auto;">
  <div class="rows mt-5 text-center">
  <div class="Cards">
    <a href="reacharge.php" style="display: inline-block; color:whitesmoke; text-decoration:none; text-align: center; margin-right: 40px;">
      <div style="display: block;">
        <!-- <i class="fa-solid fa-coins fw-bolder fs-1"></i> -->
        <img src="Images/money.png" alt="" srcset="" width="86px">
      </div>
      <div style="display: block; margin-top: 10px; text-decoration: none;">
        Reacharge
      </div>
    </a>
    <a href="withdraw.php" style="display: inline-block; color:whitesmoke; text-align:  center; text-decoration:none; margin-right: 40px;">
      <div style="display: block;">
        <!-- <i class="fa-solid fa-money-bill-transfer fw-bolder fs-1"></i> -->
        <img src="Images/withdraw.png" width="96px" alt="" srcset="">
      </div>
      <div style="display: block; margin-top: 10px; text-decoration: none;">
        Withdraw
      </div>
    </a>
    <a href="wallet.php" style="display: inline-block; color:whitesmoke; text-decoration:none; text-align: center; margin-right: 40px;">
      <div style="display: block;">
        <!-- <i class="fa-solid fa-wallet fw-bolder fs-1"></i> -->
        <img src="Images/wallet.png" width="96px" alt="" srcset="">
      </div>
      <div style="display: block; margin-top: 10px; text-decoration:none;">
        Wallet
      </div>
    </a>
  </div>
</div>
<div class="rows mt-5 text-center">
  <div class="Cards">
    <a href="team.php" style="display: inline-block; color:whitesmoke; text-decoration: none; text-align: center; margin-right: 40px;">
      <div style="display: block;">
        <!-- <i class="fa-solid fa-people-group fw-bolder fs-1" style="text-decoration:none;"></i> -->
        <img src="Images/multi-agent-system.png" width="96px" alt="" srcset="">
      </div>
      <div style="display: block; margin-top: 10px;">
        Team
      </div>
    </a>
    <a href="transfer.php" style="display: inline-block; color:whitesmoke; text-decoration:none; text-align: center; margin-right: 40px;">
      <div style="display: block;">
        <!-- <i class="fa-solid fa-landmark fw-bolder fs-1"></i> -->
        <img src="Images/transfer-money.png" width="96px" alt="" srcset="">
      </div>
      <div style="display: block; margin-top: 10px; text-decoration:none;">
        Transfer Money
      </div>
    </a>
    <a href="" style="display: inline-block; color:whitesmoke; text-decoration:none; text-align: center; margin-right: 40px;">
      <div style="display: block;">
        <!-- <i class="fa-solid fa-newspaper fw-bolder fs-1"></i> -->
        <img src="Images/global-news.png" width="96px" alt="" srcset="">
      </div>
      <div style="display: block; margin-top: 10px; text-decoration:none;">
        News
      </div>
    </a>
  </div>
</div>
<div class="rows mt-5 text-center">
  <div class="Cards">
    <a href="" style="display: inline-block; color:whitesmoke; text-decoration:none; text-align: center; margin-right: 50px;">
      <div style="display: block;">
        <!-- <i class="fa-solid fa-phone-volume fw-bolder fs-1" style="text-decoration:none;"></i> -->
        <img src="Images/help-desk.png" width="96px" alt="" srcset="">
      </div>
      <div style="display: block; margin-top: 10px; text-decoration: none;">
        Help
      </div>
    </a>
    <a href="" style="display: inline-block; color:whitesmoke; text-decoration:none; text-align: center; margin-right: 50px;">
      <div style="display: block;">
        <!-- <i class="fa-brands fa-telegram fw-bolder fs-1"></i> -->
        <img src="Images/telegram.png" width="96px" alt="" srcset="">
      </div>
      <div style="display: block; margin-top: 10px; text-decoration:none;">
        Telegram
      </div>
    </a>
    <a href="profile.php" style="display:  inline-block; color:whitesmoke; text-decoration:none; text-align: center; margin-right: 50px;">
      <div style="display: block;">
        <!-- <i class="fa-solid fa-power-off fw-bolder fs-1"></i> -->
        <img src="Images/user.png" width="96px" alt="" srcset="">
      </div>
      <div style="display: block; margin-top: 10px; text-decoration:none;">
        My Profile
      </div>
    </a>
  </div>
</div>
  </div>
</div>
</body>
</html>