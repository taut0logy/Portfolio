<?php
session_start();
if(isset($_SESSION['username'])){
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in as Admin</title>
    <link rel="stylesheet" href="style/index-style.css">
    <style>
        .contact-form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form-input{
            margin-bottom: 20px;
            width: 500px;
            max-width: 80%;
        }

        input[type="checkbox"]{
            display: inline;
        }
        .input-group{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
    </style>
        
</head>
<body>
    <?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username) || empty($password)){
            echo "<script>alert('Please enter your username and password!')</script>";
            exit();
        }
        $conn = mysqli_connect('localhost:3307', 'root', '', 'portfolio_db');
        if(!$conn){
            die('Connection failed: '.mysqli_connect_error());
        }
        $select = "SELECT * FROM auth WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $select);
        if(mysqli_num_rows($result) > 0){
            $_SESSION['username'] = $username;
            if(isset($_POST['remember'])){
                setcookie('username', $username, time() + 60*60*24*7);
                setcookie('password', $password, time() + 60*60*24*7);
            }
            header('Location: dashboard.php');
        }else{
            echo "<script>alert('Invalid username or password!')</script>";
            echo "<script>window.open('signin.php', '_self')</script>";
        }
        mysqli_close($conn);
        exit();
    } else {
    ?>
    <section class="signin section" id="signin">
        <h2 class="section-title title-center underline" data-title="Go to dashboard">Sign in as Admin</h2>

        <form action="signin.php" method="post" class="contact-form">
            <div class="form-input">
                
                <input class="input-control" type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-input">
                
                <input class="input-control" type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
            <input type="checkbox" name="remember" value="remember"><label for="remember">Remember me for 7 days</label></div>
            <input type="submit" name="submit" value="Sign in" class="btn btn-contact">
            
            
        </form>
    </section>
    <?php
    if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
        $username = $_COOKIE['username'];
        $password = $_COOKIE['password'];
        echo "<script>
        document.getElementById('username').value = '$username';
        document.getElementById('password').value = '$password';
        </script>";
        }
    }
    if(isset($_POST['reset'])){

        echo "<script>
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
        </script>";
    }
    ?>
</body>
</html>