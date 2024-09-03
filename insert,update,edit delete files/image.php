<?php


$connection = mysqli_connect("localhost", "root", "", "registering");

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $image = $_FILES['image']['name'];
    $status = $_POST['status'];

   
    $insert_image_query = "INSERT INTO testing (firstName, lastName, email, password, phoneNumber, address, image, status) 
                           VALUES ('$firstName', '$lastName', '$email', '$password', '$phoneNumber', '$address', '$image', '$status');";
  
    $insert_image_query_run = mysqli_query($connection, $insert_image_query);

   
    if ($run) {
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
