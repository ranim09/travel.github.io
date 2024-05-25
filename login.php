<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $place = $_POST['place'];
    $guests = $_POST['guests'];
    $arrival = $_POST['arrival'];
    $leaving = $_POST['leaving'];

    $conn=new mysqli('localhost','root','','test');
    if($conn->connect_error){
        die('connection Failed : '.$conn->connection_error);
    }else{
        $stmt=$conn->prepare("insert into login(email,password,place,guests,arrival,leaving) values(?,?,?,?,?,?)");
        $stmt->bind_param("sssssi",$email,$password,$place,$guests,$arrival,$leaving);
        $stmt->execute();
        echo "registration successful...";
        $stmt->close();
        $conn->close();
    }
    
?>