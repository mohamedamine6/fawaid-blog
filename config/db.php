<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "fawaid_blog";

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    mysqli_set_charset($conn, "utf8mb4");
    // echo "Connected successfully";
}

return $conn;

?>