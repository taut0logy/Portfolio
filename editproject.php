<?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'portfolio_db');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    echo "<script>console.log('id: " . $id . "')</script>";
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $link = $_POST['link'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    $update = "UPDATE projects SET title='$name', description='$desc', link='$link' WHERE projects.id='$id'";
    $result = mysqli_query($conn, $update);

    if (!empty($photo)) {
        //delete old photo
        $select = "SELECT photo FROM projects WHERE id='$id'";
        $result = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($result);
        $deleteFilePath = "img/" . $row['photo'];
        unlink($deleteFilePath);
        $target = "img/" . basename($photo);
        if (move_uploaded_file($photo_tmp, $target)) {
        } else {
            echo "<script>alert('Failed to upload image!')</script>";
        }
        $update = "UPDATE projects SET photo='$photo' WHERE id='$id'";
        $result2 = mysqli_query($conn, $update);
        mysqli_close($conn);
        if ($result2) {

            echo "<script>alert('Project updated successfully!')</script>";
            echo "<script>window.open('dashboard.php','_self')</script>";
        } else {
            echo "<script>alert('Failed to update project!')</script>";
            echo "<script>window.open('dashboard.php','_self')</script>";
        }
    }
}
$id = $_GET['id'];
echo "<script>console.log('1id: " . $id . "')</script>";
$select = "SELECT * FROM projects WHERE id='$id'";
$result = mysqli_query($conn, $select);
// if (mysqli_num_rows($result) == 0) {
// echo "<script>alert('No project found!')</script>";
// echo "<script>window.open('dashboard.php','_self')</script>";
// }
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$name = $row['title'];
$desc = $row['description'];
$link = $row['link'];
$photo = $row['photo'];
mysqli_close($conn);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Project</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/index-style.css">
    <style>
        .contact-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form-input {
            margin-bottom: 20px;
            width: 500px;
            max-width: 80%;
        }

        input[type="checkbox"] {
            display: inline;
        }

        .input-group {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
    </style>
</head>



<body>
    <section class="addproject section">
        <h2 class="section-title title-center underline" data-title="Edit">Project</h2>
        <form action="editProject.php" method="post" class="contact-form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-input"><input class="input-control" name="name" type="text" placeholder="Title" value="<?php echo $name; ?>" required></div>
            <div class="form-input"><textarea class="input-control textarea" id="desc" name="desc" placeholder="Description (must be within 500 characters)" rows="30" cols="30" required><?php echo $desc; ?></textarea></div>
            <div class="form-input"><input class="input-control" name="link" type="text" placeholder="Link" value="<?php echo $link; ?>" required></div>
            <div class="form-input"><input class="input-control" name="photo" type="file" placeholder="Project Image"></div>
            <input type="submit" name="submit" value="Confirm Edit" class="btn btn-contact">
        </form>
    </section>
    <script src="" async defer></script>
</body>

</html>