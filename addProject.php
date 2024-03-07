<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Project</title>
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
<?php
include_once('db.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $link = $_POST['link'];
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    if (!empty($photo)) {
        $target = "img/" . basename($photo);
        if (move_uploaded_file($photo_tmp, $target)) {
        } else {
            echo "<script>alert('Failed to upload image!')</script>";
        }

        $insert = "INSERT INTO projects (title, description, link, photo) VALUES ('$name', '$desc', '$link', '$photo')";
        $result = mysqli_query($conn, $insert);
        mysqli_close($conn);
        if ($result) {
            echo "<script>alert('Project added successfully!')</script>";
            echo "<script>window.open('dashboard.php','_self')</script>";
            exit();
        } else {
            echo "<script>alert('Failed to add project!')</script>";
        }
    } else {
        echo "<script>alert('Please select an image!')</script>";
    }
}
?>


<body>
    <section class="addproject section">
        <h2 class="section-title title-center underline" data-title="Add a">New project</h2>
        <form action="addProject.php" method="post" class="contact-form" enctype="multipart/form-data">
            <div class="form-input"><input class="input-control" name="name" type="text" placeholder="Title" required></div>
            <div class="form-input"><textarea class="input-control textarea" id="desc" name="desc" placeholder="Description (must be within 500 characters)" rows="30" cols="30" required></textarea></div>
            <div class="form-input"><input class="input-control" name="link" type="text" placeholder="Link" required></div>
            <div class="form-input"><input class="input-control" name="photo" type="file" placeholder="Project Image" required></div>
            <input type="submit" name="submit" value="Add Project" class="btn btn-contact">
        </form>
    </section>
    <script src="" async defer></script>
</body>

</html>