<<?php
    include "config.php";
      
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
                        <a class="nav-link active" aria-current="page" href="index.php">details</a>
                    </li>
                    <li class="nav-item">
                        <a type="button" class="btn btn-primary nav-link active" href="create.php">HOME</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Registration Form</h2>
        <form id="registrationForm" method="post" enctype="multipart/form-data">

            <label for="firstName">First Name</label><br>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
            <span id="firstNameError" class="error text-danger"></span><br>

            <label for="lastName">Last Name</label><br>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name"><br>

            <label for="email">Email</label><br>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"><br>

            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"><br>
            <span id="passwordError" class="error text-danger"></span><br>

            <label for="confirmPassword">Confirm Password</label><br>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm password"><br>
            <span id="confirmPasswordError" class="error text-danger"></span>

            <label for="phoneNumber">Phone Number</label><br>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number"><br>
            <span id="phoneError" class="error text-danger"></span><br>

            <label for="address">Address</label><br>
            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address"><br>

            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image" accept="image/*"><br>

            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
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
                document.getElementById('firstNameError').innerText = 'First name is must.';
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
            const phoneRegex = /^\d{10}$/; // 10 phone number want
            if (!phoneRegex.test(phoneNumber)) {
                valid = false;
                phoneError.innerText = 'Phone number must be 10 want.';
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
