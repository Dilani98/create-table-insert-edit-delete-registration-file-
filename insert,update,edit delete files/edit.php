<?php
include "config.php";

$id = "";
$firstName = "";
$lastName = "";
$email = "";
$password = "";
$phoneNumber = "";
$address = "";
$image = "";
$status = "";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM testing WHERE id=$id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $email = $row["email"];
        $password = $row["password"];
        $phoneNumber = $row["phoneNumber"];
        $address = $row["address"];
        $image = $row["image"]; // Use existing image
        $status = $row["status"];
    } else {
        header("Location: index.php");
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST['id']; 
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
    }

    if ($password !== $confirmPassword) {
        $error = "Passwords do not match.";
    } else {
        $sql = "UPDATE testing 
                SET firstName='$firstName', lastName='$lastName', email='$email', password='$password', 
                    phoneNumber='$phoneNumber', address='$address', image='$image', status='$status' 
                WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result) {
            $success = "Updated successfully.";
            header("Location: index.php");
            exit;
        } else {
            $error = "Error updating registration: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="btn btn-primary nav-link active" href="create.php">Add New</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Update Registration Form</h2>
        <form id="registrationForm" method="post" enctype="multipart/form-data">

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form id="registrationForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="firstName">First Name</label><br>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>" placeholder="Enter first name">
            <span id="firstNameError" class="error text-danger"></span><br>

            <label for="lastName">Last Name</label><br>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>" placeholder="Enter last name"><br>

            <label for="email">Email</label><br>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter email"><br>

            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" placeholder="Enter password"><br>
            <span id="passwordError" class="error text-danger"></span><br>

            <label for="confirmPassword">Confirm Password</label><br>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?php echo $password; ?>" placeholder="Confirm password"><br>
            <span id="confirmPasswordError" class="error text-danger"></span>

            <label for="phoneNumber">Phone Number</label><br>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $phoneNumber; ?>" placeholder="Enter phone number"><br>
            <span id="phoneError" class="error text-danger"></span><br>

            <label for="address">Address</label><br>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" placeholder="Enter address"><br>

            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image" accept="image/*"><br>
            <img src="<?php echo "uploads/" . $image; ?>" width="75" alt="image"><br>

            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control">
                <option value="active" <?php echo $status == 'active' ? 'selected' : ''; ?>>Active</option>
                <option value="inactive" <?php echo $status == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
            </select><br>
            <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
        </form>
    </div>

    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            let valid = true;

            // First Name validation
            const firstName = document.getElementById('firstName').value.trim();
            if (firstName === '') {
                valid = false;
                document.getElementById('firstNameError').innerText = 'First name is required.';
            } else {
                document.getElementById('firstNameError').innerText = '';
            }

            // Password validation
            const password = document.getElementById('password').value;
            const passwordError = document.getElementById('passwordError');
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(password)) {
                valid = false;
                passwordError.innerText = 'Password must be at least 8 characters long, include uppercase, lowercase, a number, and a special character.';
            } else {
                passwordError.innerText = '';
            }

            // Confirm Password validation
            const confirmPassword = document.getElementById('confirmPassword').value;
            const confirmPasswordError = document.getElementById('confirmPasswordError');
            if (password !== confirmPassword) {
                valid = false;
                confirmPasswordError.innerText = 'Passwords do not match.';
            } else {
                confirmPasswordError.innerText = '';
            }

            // Phone Number validation
            const phoneNumber = document.getElementById('phoneNumber').value.trim();
            const phoneError = document.getElementById('phoneError');
            const phoneRegex = /^\d{10}$/; // 10-digit phone number
            if (!phoneRegex.test(phoneNumber)) {
                valid = false;
                phoneError.innerText = 'Phone number must be 10 digits.';
            } else {
                phoneError.innerText = '';
            }

            if (!valid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
