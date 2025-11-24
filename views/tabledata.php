<?php
session_start();

// Check if the user is NOT logged in
if (empty($_SESSION["userid"])) {
    header("Location: ../auth/login.php");
    exit();
}

include('../config/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Resident Records Data</title>
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
          <a class="nav-link active" href="tabledata.php">Results</a>
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
    <div class="card main-card">
        
        <!-- HEADER -->
        <div class="card-header-custom">
            <div class="d-flex justify-content-center align-items-center gap-3">
                <img src="../assets/img/logo.jpeg" alt="Logo" class="logo-img">
                <div class="text-start">
                    <h2 class="mb-0 fw-bold text-dark">Resident Records</h2>
                    <p class="text-muted mb-0 small">Database Management System</p>
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            
            <!-- CONTROLS ROW -->
            <div class="row g-3 mb-4 align-items-center">
                
                <!-- Show Entries (Fixed Design) -->
                <div class="col-md-6 d-flex align-items-center">
                    <span class="text-secondary me-2 fw-bold small">Show</span>
                    
                    <select id="entries" class="form-select form-select-sm shadow-sm" 
                            onchange="changeTableSize(this.value)" 
                            style="width: auto; min-width: 75px; cursor: pointer;">
                        <?php
                        $entriesPerPage = 10; 
                        if (isset($_GET['show'])) {
                            $val = intval($_GET['show']);
                            if (in_array($val, [10, 50, 100])) $entriesPerPage = $val;
                        }
                        ?>
                        <option value="10" <?= ($entriesPerPage == 10 ? 'selected' : '') ?>>10</option>
                        <option value="50" <?= ($entriesPerPage == 50 ? 'selected' : '') ?>>50</option>
                        <option value="100" <?= ($entriesPerPage == 100 ? 'selected' : '') ?>>100</option>
                    </select>
                    
                    <span class="text-secondary ms-2 fw-bold small">entries</span>
                </div>

                <!-- Search Box -->
                <div class="col-md-6">
                    <form method="POST" class="d-flex gap-2 justify-content-md-end">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fa-solid fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Search residents..." required>
                            <button type="submit" name="submit" class="btn btn-primary search-btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- DATA TABLE -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-head-custom">
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle</th>
                            <th>Address</th>
                            <th>Relation</th>
                            <th>Age</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Civil Status</th>
                            <th>Education</th>
                            <th>Job</th>
                            <th>Vaccine</th>
                            <th>Status</th>
                            <th>Contact</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // 1. CONNECTION
                        $conn = new mysqli("localhost", "root", "", "php_connection");
                        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

                        // 2. SEARCH LOGIC
                        if (isset($_POST['submit'])) {
                            $search = $conn->real_escape_string($_POST['search']);
                            $sql = "SELECT * FROM table1 WHERE 
                            lastname LIKE '%$search%' OR 
                            firstname LIKE '%$search%' OR 
                            middlename LIKE '%$search%' OR 
                            address LIKE '%$search%' OR 
                            status LIKE '%$search%'";
                        } else {
                            $sql = "SELECT * FROM table1 ORDER BY lastname ASC";
                        }

                        // 3. PAGINATION CALCULATION
                        $res = $conn->query($sql);
                        $rowCount = $res->num_rows;
                        $currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
                        $totalPages = ceil($rowCount / $entriesPerPage);
                        
                        if ($currentPage > $totalPages && $totalPages > 0) $currentPage = $totalPages;
                        
                        $startIndex = ($currentPage - 1) * $entriesPerPage;
                        $sql .= " LIMIT $startIndex, $entriesPerPage";
                        $res = $conn->query($sql);

                        // 4. DISPLAY DATA
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="fw-bold text-dark"><?= htmlspecialchars($row['lastname']) ?></td>
                                <td><?= htmlspecialchars($row['firstname']) ?></td>
                                <td><?= htmlspecialchars($row['middlename']) ?></td>
                                <td class="text-truncate" style="max-width: 150px;"><?= htmlspecialchars($row['address']) ?></td>
                                <td><?= htmlspecialchars($row['relationship']) ?></td>
                                <td><?= htmlspecialchars($row['age']) ?></td>         
                                <td><?= htmlspecialchars($row['birthday']) ?></td>
                                <td><?= htmlspecialchars($row['gender']) ?></td>
                                <td><?= htmlspecialchars($row['civilstatus']) ?></td>
                                <td><?= htmlspecialchars($row['educbackground']) ?></td>
                                <td><?= htmlspecialchars($row['occupation']) ?></td>
                                <td><?= htmlspecialchars($row['vaccine']) ?></td>
                                <td><span class="status-badge"><?= htmlspecialchars($row['status']) ?></span></td>
                                <td><?= htmlspecialchars($row['contact']) ?></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="edit.php?id=<?= $row['residentno'] ?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                        <button onclick="prepareDelete(<?= $row['residentno'] ?>)" class="btn btn-sm btn-danger" title="Delete"> 
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php 
                            } 
                        } else {
                            echo "<tr><td colspan='15' class='text-center py-5 text-muted'>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION FOOTER -->
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <div class="text-muted small">
                    Showing <b><?= $rowCount > 0 ? $startIndex + 1 : 0 ?></b> to <b><?= min($startIndex + $entriesPerPage, $rowCount) ?></b> of <b><?= $rowCount ?></b>
                </div>

                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm mb-0">
                        
                        <!-- First Button -->
                        <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?show=<?= $entriesPerPage ?>&page=1">First</a>
                        </li>
                        
                        <!-- Prev Button -->
                        <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?show=<?= $entriesPerPage ?>&page=<?= $currentPage - 1 ?>">&laquo;</a>
                        </li>

                        <!-- Page Numbers (Window of 5) -->
                        <?php
                        $range = 2; 
                        $start = max(1, $currentPage - $range);
                        $end = min($totalPages, $currentPage + $range);
                        if ($end - $start < 4) {
                           if ($start == 1) $end = min($totalPages, $start + 4);
                           else if ($end == $totalPages) $start = max(1, $end - 4);
                        }

                        for ($i = $start; $i <= $end; $i++) {
                        ?>
                            <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                                <a class="page-link" href="?show=<?= $entriesPerPage ?>&page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php } ?>

                        <!-- Next Button -->
                        <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?show=<?= $entriesPerPage ?>&page=<?= $currentPage + 1 ?>">&raquo;</a>
                        </li>
                        
                        <!-- Last Button -->
                        <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="?show=<?= $entriesPerPage ?>&page=<?= $totalPages ?>">Last</a>
                        </li>

                    </ul>
                </nav>
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-3 shadow-lg border-0">
                        <!-- Header -->
                         <div class="modal-header bg-danger text-white border-0">
                            <h5 class="modal-title fw-bold">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i> Confirm Deletion
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Body -->
                         <div class="modal-body text-center py-4">
                            <div class="text-danger mb-3">
                                <i class="fa-solid fa-trash-can fa-3x"></i>
                            </div>
                            <p class="mb-1 fs-5 text-dark fw-semibold">Are you sure you want to delete?</p>
                            <p class="small text-muted">This will permanently remove the record.</p>
                        </div>
                        <!-- Footer -->
                         <div class="modal-footer border-0 justify-content-center pb-4">
                            <button type="button" class="btn btn-secondary px-4 rounded-pill" data-bs-dismiss="modal">Cancel</button>
                            <!-- This button triggers the actual deletion -->
                             <button type="button" class="btn btn-danger px-4 rounded-pill fw-bold" onclick="executeDelete()">Delete Record</button>
                            </div>
                        </div>
                    </div>
                </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Variable to hold the ID we want to delete
    let deleteId = 0;

    // 1. Function called when you click the Trash Icon
    function prepareDelete(id) {
        deleteId = id; // Store the ID
        // Open the Bootstrap Modal
        var myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        myModal.show();
    }

    // 2. Function called when you click "Delete Record" inside the Modal
    function executeDelete() {
        if (deleteId > 0) {
            // Redirect to your actual delete PHP script
            // Note: Updated path based on your new folder structure
            window.location.href = '../actions/delete.php?id=' + deleteId;
        }
    }
</script>

</body>
</html>