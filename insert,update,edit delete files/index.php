<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Registration</title>
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
    <div class="container my-4">
    <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Image</th>
        <th>Status</th>
        <th>ACTIONS</th>
      </tr>
      
    </thead>

      <?php
        include "config.php";
        $sql = "select * from testing";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[id]</th>
        <td>$row[firstName]</td>
        <td>$row[lastName]</td>
        <td>$row[email]</td>
        <td>$row[password]</td>
        <td>$row[phoneNumber]</td>
        <td>$row[address]</td>
        <td>$row[image]</td>
         <td>$row[status]</td>
         <td>
                  <a class='btn btn-success' href='edit.php?id=$row[id]'>edit</a></br></span>
                  <a class='btn btn-danger' href='delete.php?id=$row[id]'>delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    
  </table>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>