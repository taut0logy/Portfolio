<?php
 $id=$_GET['id'];
    $conn=mysqli_connect('localhost:3307','root','','portfolio_db');
    if(!$conn){
        die('Connection failed: '.mysqli_connect_error());
    }
    $delete="DELETE FROM projects WHERE id='$id'";
    if(mysqli_query($conn,$delete)){
        header('Location: dashboard.php');
    }else{
        echo "<script>alert('Failed to delete project!')</script>";
        echo "<script>window.open('dashboard.php', '_self')</script>";
}