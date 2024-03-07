<!DOCTYPE html>
<html>
<?php
include_once('db.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $percentage = $_POST['percentage'];
    $update = "UPDATE skills SET name='$name', description='$desc', percentage='$percentage' WHERE id='$id'";
    $result2 = mysqli_query($conn, $update);
    mysqli_close($conn);
    if ($result2) {
        echo "<script>alert('Skill updated successfully!')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
        exit();
    } else {
        echo "<script>alert('Failed to update project!')</script>";
        echo "<script>window.open('editSkill.php','_self')</script>";
        exit();
    }
} else {

    $id = $_GET['id'];
    echo "<script>console.log('1id: " . $id . "')</script>";
    $select = "SELECT * FROM skills WHERE id='$id'";
    $result = mysqli_query($conn, $select);

    //echo "script>Console.log('result:". $result."')</script>";
    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('No skill found!')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
        exit();
    }
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $name = $row['name'];
    $desc = $row['description'];
    $percentage = $row['percentage'];
?>

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
            <form action="editSkill.php" method="post" class="contact-form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-input"><input class="input-control" name="name" type="text" placeholder="Title" value="<?php echo $name; ?>" required></div>
                <div class="form-input"><textarea class="input-control textarea" id="desc" name="desc" placeholder="Description (must be within 500 characters)" rows="30" cols="30" required><?php echo $desc; ?></textarea></div>
                <div class="form-input"><input class="input-control" name="percentage" type="number" placeholder="Percentage" value="<?php echo $percentage; ?>" required></div>
                <input type="submit" name="submit" value="Confirm Edit" class="btn btn-contact">
            </form>
        </section>
    <?php
}
mysqli_close($conn);
    ?>
    </body>

</html>