<?php 
$conn = new mysqli("localhost", "root", "root", "shopping");
if($conn->connect_error){
    die("Connnection failed" .$conn->connect_error);
}