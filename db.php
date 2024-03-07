<?php
$host = 'localhost:3307';
$user = 'root';
$pass = '';
$db = 'portfolio_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
