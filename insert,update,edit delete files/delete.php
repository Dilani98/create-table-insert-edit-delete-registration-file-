<?php
$connection = mysqli_connect("localhost", "root", "", "registering");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = mysqli_real_escape_string($connection, $id);
    $sql = "DELETE FROM testing WHERE id = '$id'";
    if (mysqli_query($connection, $sql)) {
        echo '<script>location.replace("index.php")</script>';  
    } else {
        echo "Sometime went wrong: " . mysqli_error($connection);
    }
} else {
    echo "Error: id not set is a wrong.";
}
mysqli_close($connection);

?>
