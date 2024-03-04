
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Skill</title>
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
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $percentage = $_POST['percentage'];
    $desc = $_POST['desc'];
    
    $conn = mysqli_connect('localhost', 'root', '', 'portfolio_db');
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $insert = "INSERT INTO skills (name, percentage, description) VALUES ('$name', '$percentage', '$desc')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        echo "<script>alert('Skill added successfully!')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";
        exit();
    } else {
        echo "<script>alert('Failed to add skill!')</script>";
        echo "<script>window.open('addSkill.php','_self')</script>";
    }
    mysqli_close($conn);
}
?>
    <section class="addproject section">
        <h2 class="section-title title-center underline" data-title="Add a">New Skill</h2>
        <form action="addSkill.php" method="post" class="contact-form">
            <div class="form-input"><input class="input-control" name="name" type="text" placeholder="Title" required></div>
            <div class="form-input"><textarea class="input-control textarea" id="desc" name="desc" placeholder="Description (must be within 500 characters)" rows="30" cols="30" required></textarea></div>
            <div class="form-input"><input class="input-control" name="percentage" type="number" placeholder="Percentage" required></div>
            <input type="submit" name="submit" value="Add Skill" class="btn btn-contact">
        </form>
    </section>
    <script src="" async defer></script>
</body>
</html>