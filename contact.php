<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if(empty($name) || empty($email) || empty($subject) || empty($message)){
        echo "<script>alert('Please fill in all fields!')</script>";
        header('Location: index.php');
    }
    $conn = mysqli_connect('localhost:3307', 'root', '', 'portfolio_db');
    if(!$conn){
        die('Connection failed: '.mysqli_connect_error());
    }
    $insert = "INSERT INTO messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if(mysqli_query($conn, $insert)){
        echo "<script>alert('Message sent successfully!')</script>";
    }else{
        echo "<script>alert('Message not sent!')</script>";
    }
    mysqli_close($conn);
    echo "<script>window.open('index.php', '_self')</script>";

}