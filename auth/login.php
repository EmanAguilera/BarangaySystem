<?php
require '../config/conn.php';

function login($conn) {
  session_start();

  if (!empty($_SESSION["userid"])) {
    header("Location: ../views/index.php");
    exit();
  }

  if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM reglog WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
      if (password_verify($password, $row['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['userid'] = $row["userid"];
        header("Location: ../views/index.php");
      } else {
        echo "<script> alert('Wrong Password'); </script>";
      }
    } else {
      echo "<script> alert('User Not Registered'); </script>";
    }
  }
}
login($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login - Barangay 52</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- External CSS -->
<link rel="stylesheet" href="../assets/css/design.css">
</head>
<body>

    <div class="auth-wrapper">
        <div class="auth-card">
            <img src="../assets/img/logo.jpeg" alt="Logo" class="auth-logo">
            <h2 class="auth-title">Brgy Login</h2>
            <p class="auth-subtitle">Please sign in to continue</p>

            <form action="" method="post" autocomplete="off">
                <div class="mb-3 text-start">
                    <label class="form-label">Username or Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" name="usernameemail" placeholder="Enter username" required>
                    </div>
                </div>

                <div class="mb-4 text-start">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                    </div>
                </div>

                <button class="btn-auth" type="submit" name="submit">Login System</button>
            </form>

            <div class="auth-footer">
                Don't have an account? <a href="reg.php">Register Here</a>
            </div>
        </div>
    </div>

</body>
</html>