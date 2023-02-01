<?php 
$conn = new mysqli("localhost", "root", "11111", "shopping");
if($conn->connect_error){
    die("Connnection failed" .$conn->connect_error);
}