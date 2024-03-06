<!DOCTYPE html>
<html>
<?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'portfolio_db');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $institution = $_POST['institution'];
    $degree = $_POST['degree'];
    $timeline = $_POST['timeline'];
    $desc = $_POST['description'];
    $update = "UPDATE education SET institution='$institution', degree='$degree', timeline='$timeline', description='$desc' WHERE id='$id'";
    $result2 = mysqli_query($conn, $update);
    mysqli_close($conn);
    if ($result2) {
        echo "<script>alert('Education updated successfully!')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
        exit();
    } else {
        echo "<script>alert('Failed to update education!')</script>";
        echo "<script>window.open('editEducation.php','_self')</script>";
        exit();
    }
} else {

    $id = $_GET['id'];
    $select = "SELECT * FROM education WHERE id='$id'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('No education found!')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
        exit();
    }

    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $institution = $row['institution'];
    $degree = $row['degree'];
    $timeline = $row['timeline'];
    $desc = $row['description'];
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit Education</title>
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
            <h2 class="section-title title-center underline" data-title="Update ">Your Degree</h2>
            <form action="editEducation.php" method="post" class="contact-form">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-input"><input class="input-control" name="institution" type="text" placeholder="Institution" value="<?php echo $institution; ?>" required></div>
                <div class="form-input"><input class="input-control" name="degree" type="text" placeholder="Degree" value="<?php echo $degree; ?>" required></div>
                <div class="form-input"><input class="input-control" name="timeline" type="text" placeholder="Timeline" value="<?php echo $timeline; ?>" required></div>
                <div class="form-input"><textarea class="input-control textarea" id="desc" name="description" placeholder="Description (must be within 500 characters)" rows="30" cols="30" required><?php echo $desc; ?></textarea></div>

                <input type="submit" name="submit" value="Confirm Edit" class="btn btn-contact">
            </form>
        </section>
    </body>
    </body>

</html>
<?php
}
mysqli_close($conn);
?>