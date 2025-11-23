<?php
session_start(); // Start the session to check for login

// Check if the user is NOT logged in
if (empty($_SESSION["userid"])) {
    header("Location: ../auth/login.php"); // Redirect to Login
    exit(); // Stop loading the rest of the page
}

include('../config/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resident Registration</title>
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
          <a class="nav-link active" href="index.php">Fill Out</a>
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
                    <h2 class="fw-bold text-dark">Resident Registration</h2>
                    <p class="text-muted small">Please complete the form below accurately.</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form method="post" action="../actions/add.php">
                        
                        <!-- ROW 1 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Dela Cruz" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="Juan" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="middlename" placeholder="Reyes">
                            </div>
                        </div>

                        <!-- ROW 2 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="House No., Street Name, Zone" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control" name="contact" placeholder="09xxxxxxxxx" required>
                            </div>
                        </div>

                        <!-- ROW 3 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Birthday</label>
                                <input type="date" class="form-control" name="birthday" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Age</label>
                                <input type="number" class="form-control" name="age" placeholder="00" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Civil Status</label>
                                <select name="civilstatus" class="form-select" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>
                        </div>

                        <!-- ROW 4 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Education Background</label>
                                <input type="text" class="form-control" name="educbackground" placeholder="Highest Level Attained" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Occupation</label>
                                <input type="text" class="form-control" name="occupation" placeholder="Current Job" required>
                            </div>
                        </div>

                        <!-- ROW 5 -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Relationship to Head</label>
                                <input type="text" class="form-control" name="relationship" placeholder="e.g. Head, Spouse">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Vaccine Brand</label>
                                <input type="text" class="form-control" name="vaccine" placeholder="e.g. Pfizer, None" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Priority Group</label>
                                <select name="status" class="form-select" required>
                                    <option value="None">None</option>
                                    <option value="Senior">Senior Citizen</option>
                                    <option value="PWD">PWD</option>
                                    <option value="Solo Parent">Solo Parent</option>
                                    <option value="Pregnant">Pregnant</option>
                                </select>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn-submit" name="add">
                                <i class="fa-solid fa-paper-plane me-2"></i> Submit Registration
                            </button>
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