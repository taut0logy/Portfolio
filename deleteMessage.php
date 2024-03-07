<?php

$id = $_GET['id'];

include_once('db.php');

$delete = "DELETE FROM messages WHERE id='$id'";
if (mysqli_query($conn, $delete)) {
    header('Location: dashboard.php');
} else {
    echo "<script>alert('Failed to delete message!')</script>";
    echo "<script>window.open('dashboard.php', '_self')</script>";
}
mysqli_close($conn);
exit();
