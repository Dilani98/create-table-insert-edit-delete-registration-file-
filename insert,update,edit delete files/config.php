<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registering";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}
	if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        $image = $_FILES['image']['name'];
        $status = $_POST['status'];

        $q = " INSERT INTO testing (firstName,lastName,email,password,phoneNumber,address,image,status) VALUES ( '$firstName', '$lastName', '$email','$password','$phoneNumber','$address','$image','$status');";

        $query_run = mysqli_query($conn,$q);
        if($query_run)
        {
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/". $_FILES['image']['name']);
            $_SESSION['status'] = "Image stored successfully";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['status'] = "Image not stored successfully";
            header("Location: create.php");
            exit();
        }
        }
	

?>