<?php
session_start();

// 1. Security: Check if Logged In
if (empty($_SESSION["userid"])) {
    header("Location: ../auth/login.php");
    exit();
}

// 2. Logic Check: Did they actually click an Edit button?
// If $_GET['id'] is missing, they tried to access edit.php directly.
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: tabledata.php"); // Send them back to the table
    exit();
}

include('../config/conn.php');
$id = $_GET['id'];
$query = mysqli_query($conn, "select * from `table1` where residentno='$id'");
$row = mysqli_fetch_array($query);

// 3. Extra Safety: What if the ID doesn't exist in the database?
if (!$row) {
    echo "<script>alert('Record not found!'); window.location.href='tabledata.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Resident Info</title>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- External Custom CSS -->
<link rel="stylesheet" href="../assets/css/design.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
        <i class="fa-solid fa-building-columns me-2"></i> Barangay 52
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Fill Out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tabledata.php">Results</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../auth/logout.php">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            
            <div class="card main-card">
                
                <div class="card-header-custom">
                    <img src="../assets/img/logo.jpeg" alt="Logo" class="logo-img">
                    <h2 class="fw-bold text-dark mb-0">Edit Resident Info</h2>
                    <p class="text-muted small mt-1">Update the record for: <strong><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></strong></p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="../actions/update.php?id=<?php echo $id; ?>">
                        
                        <!-- Row 1 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Last Name</label>
                                <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">First Name</label>
                                <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Middle Name</label>
                                <input type="text" value="<?php echo $row['middlename']; ?>" name="middlename" class="form-control">
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Address</label>
                                <input type="text" value="<?php echo $row['address']; ?>" name="address" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Contact Number</label>
                                <input type="text" value="<?php echo $row['contact']; ?>" name="contact" class="form-control" required>
                            </div>
                        </div>

                        <!-- Row 3 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Birthday</label>
                                <input type="date" value="<?php echo $row['birthday']; ?>" name="birthday" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Age</label>
                                <input type="number" value="<?php echo $row['age']; ?>" name="age" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="Male" <?php if($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                    <option value="Female" <?php if($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Civil Status</label>
                                <select name="civilstatus" class="form-select" required>
                                    <option value="Single" <?php if($row['civilstatus'] == 'Single') echo 'selected'; ?>>Single</option>
                                    <option value="Married" <?php if($row['civilstatus'] == 'Married') echo 'selected'; ?>>Married</option>
                                    <option value="Widowed" <?php if($row['civilstatus'] == 'Widowed') echo 'selected'; ?>>Widowed</option>
                                    <option value="Separated" <?php if($row['civilstatus'] == 'Separated') echo 'selected'; ?>>Separated</option>
                                    <option value="Divorced" <?php if($row['civilstatus'] == 'Divorced') echo 'selected'; ?>>Divorced</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 4 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Education</label>
                                <input type="text" value="<?php echo $row['educbackground']; ?>" name="educbackground" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Occupation</label>
                                <input type="text" value="<?php echo $row['occupation']; ?>" name="occupation" class="form-control" required>
                            </div>
                        </div>

                        <!-- Row 5 -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Relationship</label>
                                <input type="text" value="<?php echo $row['relationship']; ?>" name="relationship" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Vaccine Brand</label>
                                <input type="text" value="<?php echo $row['vaccine']; ?>" name="vaccine" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Priority Group</label>
                                <select name="status" class="form-select" required>
                                    <option value="None" <?php if($row['status'] == 'None') echo 'selected'; ?>>None</option>
                                    <option value="Senior" <?php if($row['status'] == 'Senior') echo 'selected'; ?>>Senior Citizen</option>
                                    <option value="PWD" <?php if($row['status'] == 'PWD') echo 'selected'; ?>>PWD</option>
                                    <option value="Solo Parent" <?php if($row['status'] == 'Solo Parent') echo 'selected'; ?>>Solo Parent</option>
                                    <option value="Pregnant" <?php if($row['status'] == 'Pregnant') echo 'selected'; ?>>Pregnant</option>
                                </select>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="row g-2">
                            <div class="col-md-8">
                                <button type="submit" class="btn-update" name="add">
                                    <i class="fa-solid fa-save me-2"></i> Save Changes
                                </button>
                            </div>
                            <div class="col-md-4">
                                <a href="tabledata.php" class="btn-back">
                                    Cancel
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>