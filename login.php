<?php
include 'database.php';
session_start();

// Check if the user submitted the form
if (isset($_POST['submit'])) {
    // Retrieve the username and password submitted by the user
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    // Check if the connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Query the database for the user's information
    $query = "SELECT * FROM approved WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful and if the user exists
    if ($result && mysqli_num_rows($result) > 0) {
        // User exists, start a new session and redirect to the homepage
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } else {
        // User does not exist or password is incorrect, show an error message
        $error = "Invalid username or password";
    }

    // Close the database connection
    mysqli_close($conn);
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
<div class="wrapper">
        <form class="form-right" action="" method="POST">
            <h2 class="text-uppercase">Login</h2>
            <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
            <div class="mb-3">
                <label>Username</label>
                <input type="text" class="input-field" name="username" required>
            </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" id="pwd" class="input-field">
                </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                </label>
                <p>Want to Create an Account? <a href="index.php">Register Now</a> </p>
            </div>
            <div class="form-field">
                <input type="submit" value="Register" class="register" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
