<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Activity</title>
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
    $club = $_POST['club'];
    $work = $_POST['work'];
    $timeline = $_POST['timeline'];
    $desc = $_POST['description'];
    
    $insert = "INSERT INTO extracurricular (club, work, timeline, description) VALUES ('$club', '$work', '$timeline', '$desc')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        echo "<script>alert('Activity added successfully!')</script>";
        echo "<script>window.open('dashboard.php', '_self')</script>";
    } else {
        echo "<script>alert('Failed to add activity!')</script>";
    }
    mysqli_close($conn);
}
?>

<body>
    <section class="addproject section">
        <h2 class="section-title title-center underline" data-title="Add a">New work</h2>
        <form action="addActivity.php" method="post" class="contact-form">
            <div class="form-input"><input class="input-control" name="club" type="text" placeholder="Club" required></div>
            <div class="form-input"><input class="input-control" name="work" type="text" placeholder="Work" required></div>
            <div class="form-input"><input class="input-control" name="timeline" type="text" placeholder="Timeline" required></div>
            <div class="form-input"><textarea class="input-control textarea" id="desc" name="description" placeholder="Description (must be within 500 characters)" rows="30" cols="30" required></textarea></div>

            <input type="submit" name="submit" value="Add Work" class="btn btn-contact">
        </form>
    </section>
</body>

</html>