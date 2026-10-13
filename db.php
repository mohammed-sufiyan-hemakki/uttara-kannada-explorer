<?php
$conn = mysqli_connect("localhost", "root", "", "uk_explorer");
if (!$conn) { 
    die("Database Connection failed: " . mysqli_connect_error()); 
}
?>