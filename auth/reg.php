<?php
require '../config/conn.php';

function registerUser($name, $username, $email, $password, $conpassword, $conn) {
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);

    $duplicate = mysqli_query($conn, "SELECT * FROM reglog WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or Email Has Already Been Taken'); </script>";
    }
    else {
        if($password == $conpassword) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO reglog VALUES ('', '$name', '$username', '$email', '$hashed_password')";
            mysqli_query($conn, $query);
            echo "<script> alert('Registration Successful'); </script>";
        } else {
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    }
}

session_start();
if(!empty($_SESSION["userid"])){
    header("Location: ../views/index.php");
    exit();
}

if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conpassword = $_POST["conpassword"];
    
    registerUser($name, $username, $email, $password, $conpassword, $conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Registration - Barangay 52</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- External CSS -->
<link rel="stylesheet" href="../assets/css/design.css">
</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-card register"> <!-- Added 'register' class for wider card -->
            <img src="../assets/img/logo.jpeg" alt="Logo" class="auth-logo">
            <h2 class="auth-title">Create Account</h2>
            <p class="auth-subtitle">Register new admin access</p>

            <form action="" method="post" autocomplete="off">
                
                <div class="mb-3 text-start">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. Juan Dela Cruz" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 text-start">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="col-md-6 mb-3 text-start">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 text-start">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••" required>
                    </div>
                    <div class="col-md-6 mb-3 text-start">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="conpassword" class="form-control" placeholder="••••••" required>
                    </div>
                </div>

                <button class="btn-auth" type="submit" name="submit">Register Account</button>
            </form>

            <div class="auth-footer">
                Already have an account? <a href="login.php">Login Here</a>
            </div>
        </div>
    </div>

</body>
</html>