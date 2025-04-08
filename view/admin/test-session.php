<?php
$conn = mysqli_connect("localhost", "root", "", "NhaHang");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected to MySQL successfully!";
?>
