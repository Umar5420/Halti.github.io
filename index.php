<?php
include 'database.php';

// Insert data into the table
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $contact = $_POST['contact'];
  $trx_acc = $_POST['trx_acc'];
  
  function updatereferel()
{
    $halti = "SELECT * FROM approved WHERE refrel = '$_POST[refrel]'";
    $rzlt = mysqli_query($GLOBALS['conn'],$halti);
    if($rzlt){
        if(mysqli_num_rows($rzlt)==1){
            $rzlt_fetch=mysqli_fetch_assoc($rzlt);
            $points = $rzlt_fetch['refrel_points']+2.34;
            $next = "UPDATE approved SET refrel_points='$points' WHERE name='$rzlt_fetch[name]'";
            if (!mysqli_query($GLOBALS['conn'],$next)) {
                echo "<script>
                alert(query not rinnug);
                window.location.href='login.php';
                </script>";
            }
        }else {
            "<script>alert('Invalit Refrel Code');
            window.location.href='login.php';
        </script>"; exit;
        }

    }else{
        echo "<script>alert('Cannot Run Query');
        window.location.href='login.php';
        </script>"; exit;
    }
}

  // Check for duplicate username or email
  $query = "SELECT * FROM register WHERE username='$username' OR email='$email'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    echo "Username or email already exists";
  } else { 
    if($_POST['refrel']!=''){
        updatereferel();
    }
    $refrel= strtoupper(bin2hex(random_bytes(5)));

    $query2 = "INSERT INTO register (name, username, email, password, contact, trx_acc, refrel, refrel_points, status) 
              VALUES ('$name', '$username', '$email', '$password', '$contact', '$trx_acc', '$refrel','0', 'pending')";
    if (mysqli_query($conn, $query2)) {
      echo "Registration Request Sent Seccessfully";
      
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
}
    if (isset($_GET['refrel']) && $_GET['refrel']!='') {
        if (!(isset($_SESSION['username']) && $_SESSION['username']==true)) {
            
            $me="SELECT * FROM approved WHERE refrel='$_GET[refrel]'";
            $rslt=mysqli_query($conn,$me);
            if (mysqli_num_rows($rslt)==1) {
                echo "<script>
                document.getElementById('refrel').value='$_GET[refrel]';
                </script>";
            }
        }
    }

// Close the connection
mysqli_close($conn);

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
<div class="wrapper">
        <form class="form-right" action="" method="POST">
            <h2 class="text-uppercase">Registration form</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Name</label>
                    <input type="text" name="name" id="first_name" class="input-field">
                </div>
            </div>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" class="input-field" name="username" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="input-field" name="email" required>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="password" id="pwd" class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Contact</label>
                    <input type="text" name="contact" id="contact" class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>TRX Account</label>
                    <input type="text" name="trx_acc" id="city" class="input-field">
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Refrel</label>
                    <input type="text" name="refrel" id="refrel" class="input-field">
                </div>
            </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                </label>
                <p>Already Have a Account? <a href="login.php">Login Now</a> </p>
            </div>
            <div class="form-field">
                <input type="submit" value="Register" class="register" name="register">
            </div>
        </form>
    </div>
</body>
</html>