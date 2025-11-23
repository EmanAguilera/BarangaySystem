<?php

include('../config/conn.php');

$id = $_GET['id'];

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$address = $_POST['address'];
$relationship = $_POST['relationship'];
$age = $_POST['age'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$civilstatus = $_POST['civilstatus'];
$educbackground = $_POST['educbackground'];
$occupation = $_POST['occupation'];
$vaccine = $_POST['vaccine'];
$status = $_POST['status'];
$contact = $_POST['contact'];

$sql = "UPDATE table1 SET
    lastname = '$lastname',
    firstname = '$firstname',
    middlename = '$middlename',
    address = '$address',
    relationship = '$relationship',
    age = '$age',
    birthday = '$birthday',
    gender = '$gender',
    civilstatus = '$civilstatus',
    educbackground = '$educbackground',
    occupation = '$occupation',
    vaccine = '$vaccine',
    status = '$status',
    contact = '$contact'
    WHERE residentno = '$id';";

if (mysqli_query($conn, $sql)) {
    header('location:../views/tabledata.php');
} else {
    echo "Error updating student information: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>