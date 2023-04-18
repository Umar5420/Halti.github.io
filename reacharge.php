<?php
include 'database.php';
if (isset($_POST['submit'])) {
  $tr_id = $_POST['tr_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  // Check if the user with the provided email and name already exists in the database
  $query = "SELECT * FROM approved WHERE name = '$name' AND email = '$email'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0) {
    // If the user exists, insert the tr_id into the database
    $sql = "UPDATE approved SET tr_id = '$tr_id' WHERE name = '$name' AND email = '$email'";
    if(mysqli_query($conn,$sql)){
      echo "Data inserted successfully";
    } else {
      echo "Error inserting data: " . mysqli_error($conn);
    }
  } else {
    // If the user does not exist, display an error message
    echo "User does not exist in the database.";
  }
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
    <link rel="stylesheet" href="recharge.css">
    <title>Blockchain</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">ESOM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
<div class="container">
  <h1 class="text-center text-light"> Reacharge Details </h1>

  <div class="container mt-5">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No. </th>
            <th>Amount</th>
            <th>Profit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1.</td>
            <td>100 TRX</td>
            <td>2.34% /Daily</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="container mt-5">
    <div class="h5">Want to Join Us?</div>
    <div class="p text-white">Deposit This Payment Here : <span><abbr>TMrLgmTy5VobQinisUqiN4AFH6C5usW2xY.</abbr></span> </div>
  </div>
  <br>
  <h6>Submit your Transection ID</h6>
  <form action="" method="POST">
    <p>
    <Label>Transection ID</Label>
    <input type="text" id="username" name="tr_id" placeholder="Transection ID" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <label for="">Insert Your Name</label>
    <input type="text" id="email" name="name" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <label for="">Insert Your Email</label>
    <input type="text" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
    </p>
    <p>
    <input type="submit" id="login" name="submit" value="Submit">
    </p>
  </form>
</div>
  


</div>
</body>
</html>