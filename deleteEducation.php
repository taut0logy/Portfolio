<?php
$id = $_GET['id'];

include_once('db.php');

$delete = "DELETE FROM education WHERE id='$id'";
if (mysqli_query($conn, $delete)) {
    echo "<script>alert('Education deleted successfully!')</script>";
    echo "<script>window.open('dashboard.php', '_self')</script>";
} else {
    echo "<script>alert('Failed to delete project!')</script>";
    echo "<script>window.open('dashboard.php', '_self')</script>";
}
mysqli_close($conn);
exit();
