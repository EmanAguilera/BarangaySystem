<?php
	include('../config/conn.php');
 
	$lastname=$_POST['lastname'];
	$firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $address=$_POST['address'];
    $relationship=$_POST['relationship'];
    $age=$_POST['age'];
    $birthday=$_POST['birthday'];
    $gender=$_POST['gender'];
    $civilstatus=$_POST['civilstatus'];
    $educbackground=$_POST['educbackground'];
    $occupation=$_POST['occupation'];
    $vaccine=$_POST['vaccine'];
    $status=$_POST['status'];
    $contact=$_POST['contact'];

	mysqli_query($conn,"insert into table1 (lastname,firstname,middlename,address,relationship,age,birthday,gender,civilstatus,educbackground,occupation,vaccine,status,contact) values ('$lastname','$firstname','$middlename','$address','$relationship','$age','$birthday','$gender','$civilstatus','$educbackground','$occupation','$vaccine','$status','$contact')");
	header('location:../views/index.php');
 
?>