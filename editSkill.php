<?php
$conn = mysqli_connect('localhost', 'root', '', 'portfolio_db');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
$id = $_GET['id'];
$select = "SELECT * FROM skills WHERE id='$id'";
$result = mysqli_query($conn, $select);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['title'];
        $desc = $row['description'];
        $percentage = $row['percentage'];
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $percentage = $_POST['percentage'];

    $update = "UPDATE projects SET title='$name', description='$desc', percentage='$percentage' WHERE id='$id'";
    $result = mysqli_query($conn, $update);

    
        if ($result) {

            header('Location: dashboard.php');
            exit();
        } else {
            echo "<script>alert('Failed to update project!')</script>";
        }
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Skill</title>
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
        <h2 class="section-title title-center underline" data-title="Edit">Skill</h2>
        <form action="addProject.php" method="post" class="contact-form" enctype="multipart/form-data">
        <div class="form-input"><input class="input-control" name="name" type="text" placeholder="Title" required></div>
            <div class="form-input"><textarea class="input-control textarea" id="desc" name="desc" placeholder="Description (must be within 500 characters)" rows="30" cols="30" required></textarea></div>
            <div class="form-input"><input class="input-control" name="percentage" type="text" placeholder="Percentage" required></div>
            <input type="submit" name="submit" value="Add Project" class="btn btn-contact">
        </form>
    </section>
    <script src="" async defer></script>
</body>

</html>