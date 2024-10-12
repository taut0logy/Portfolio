<?php
$host = '127.0.0.1';
$port = 3306;
$user = 'portfolio';
$pass = 'ki_kortesi_kisui_jani_na';
$db = 'PORTFOLIO_DB';


$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
