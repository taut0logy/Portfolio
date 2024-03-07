<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}
include_once('db.php');

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_POST['reset'])) {
    setcookie('username', '', time() - 3600);
    setcookie('password', '', time() - 3600);
    echo "<script>alert('Cookies reset successfully!')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        #logout {
            padding: 0 .5rem;
            margin: 0;
            font-size: 1rem;
        }

        #reset {
            margin-inline: auto;
            font-size: 1rem;
        }

        .section {
            padding-block: 7rem;
        }

        .table-container {
            overflow-x: scroll;
        }

        .message-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .bubble {
            position: relative;
            width: 80%;
            background: var(--border-color);
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 30px;
        }

        .left:before {
            content: "";
            width: 0px;
            height: 0px;
            position: absolute;
            border-left: 24px solid var(--border-color);
            border-right: 12px solid transparent;
            border-top: 12px solid var(--border-color);
            border-bottom: 20px solid transparent;
            left: 32px;
            bottom: -24px;
        }

        .span1 {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .span2 {
            font-size: 1.2rem;
            font-weight: 400;
        }

        .delete {
            margin-left: auto;
            font-size: 1.5rem;
        }

        .delete:hover {
            cursor: pointer;
            color: var(--primary-color);
        }


        .last {
            width: 100%;
            display: flex;
            align-items: space-between;
        }

        .projects,
        .skills,
        .education,
        .activities {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .messages,
        .activities {
            background-color: var(--container-color);
        }

        .project-container {
            grid-template-rows: repeat(auto-fill, minmax(300px, 1fr));
            grid-auto-rows: 1fr;
        }

        .edit-delete {
            display: flex;
            width: 75%;
            justify-content: space-evenly;
            margin-top: 1rem;
            align-items: center;
        }

        .edit-delete .delete {
            font-size: 2rem;
            margin: 0;
        }

        table,
        tr,
        th,
        td {
            border: 2px solid;
        }

        table {
            max-width: 100%;
            border-collapse: collapse;

            /* color: var(--background-color); */
        }

        th {
            font-size: 1.5rem;
            font-weight: 600;
            padding: 1rem;
            background-color: var(--primary-color);
            /* border-bottom: 1px solid var(--background-color); */
        }

        td {
            padding: 1rem;
            margin: 2px;
            text-align: center;
        }

        td:nth-child(2) {
            max-width: 50%;
        }

        tr:nth-child(odd) {
            background: var(--background-color);
            border-color: var(--border-color);
        }

        tr:nth-child(even) {
            background: var(--border-color);
            border-color: var(--background-color);
        }

        td .delete {
            padding: .5rem;
        }
    </style>
    <title>Admin Dashboard</title>
</head>

<body>
    <form action="dashboard.php" method="post">
        <header class="header">
            <nav class="nav container">
                <a href="index.php" class="nav-logo"><span class="first-letter">D</span>ashboard</a>
                <input type="checkbox" id="nav-toggler">
                <label for="nav-toggler" class="nav-toggle"><i class="fa-solid fa-bars"></i></label>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="#messages" class="nav-link">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a href="#projects" class="nav-link">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="#skills" class="nav-link">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a href="#education" class="nav-link">Education</a>
                    </li>
                    <li class="nav-item">
                        <a href="#activities" class="nav-link">Activities</a>
                    </li>

                    <li class="nav-item">
                        <input id="logout" type="submit" name="logout" value="Sign out" class="btn">
                    </li>

                </ul>

            </nav>
        </header>
        <div class="wrapper">
            <section class="section messages" id="messages">
                <h2 class="section-title title-center underline" data-title="Welcome Raufun!">Messages for you</h2>
                <div class="message-container container">
                    <?php
                    $select = "SELECT * FROM messages";
                    $result = mysqli_query($conn, $select);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<h3>No messages yet!</h3>";
                    }
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='message-content bubble left'>
                        <div class='span1'>From: <span class='span2'>" . $row['name'] . "</span></div>
                        <div class='span1'>Email: <span class='span2'>" . $row['email'] . "</span></div>
                        <div class='span1'>Subject: <span class='span2'>" . $row['subject'] . "</span></div>
                        <span class='span1'>Message: </span>
                        <div class='message-text'>" . $row['message'] . "</div>
                        <div class= 'last'>
                        <div class='span1'>Sent: <span class='span2'>" . $row['time'] . "</span></div>
                        <a href='deleteMessage.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-trash-can'></i></a>
                        </div>
                    </div>";
                        }
                    }
                    //mysqli_close($conn);
                    ?>
                </div>

            </section>

            <section class="section projects" id="projects">
                <h2 class="section-title title-center underline" data-title="Manage">Projects</h2>
                <div class="project-container container grid">
                    <?php
                    // $conn=mysqli_connect('localhost:3307','root','','portfolio_db');
                    // if(!$conn){
                    //     die('conn failed: '.mysqli_connect_error());
                    // }
                    $select = "SELECT * FROM projects";
                    $result = mysqli_query($conn, $select);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<h3 style='width: 100%; text-align:center;'>No projects yet!</h3>";
                    }
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $image = $row['photo'];
                            //header('Content-type: image/jpeg');
                            echo "<div class='project-card'>
                        <img src='img/" . $image . "' alt='project image' class='project-img'>
                        <div class='project-details'>
                            <h3 class='project-title'>" . $row['title'] . "</h3>
                            <p class='prject-desc'>" . $row['description'] . "</p>
                            <h3>Project link: </h3>
                            <span class='project-link-text'>" . $row['link'] . "</span>
                            <span class='edit-delete'><a href='deleteProject.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-trash-can'></i></a>
                            <a href='editProject.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-pencil'></i></a>
                            </span>

                        </div>
                    </div>";
                        }
                    }
                    // mysqli_close($conn);
                    ?>

                </div>
                <a href="addProject.php" class="btn btn-contact">Add a project </a>
            </section>

            <section class="section skills" id="skills">
                <h2 class="section-title title-center underline" data-title="Manage">Skills</h2>
                <div class="skills-container container table-container">

                    <?php
                    $select = "SELECT * FROM skills";
                    $result = mysqli_query($conn, $select);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<h3 style='width: 100%; text-align:center;'>No skills yet!</h3>";
                    } else {
                        echo "<table>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Percentage</th>
                            <th colspan=2>Action</th>
                        </tr>";
                    }
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['percentage'] . "</td>
                            <td><a href='deleteSkill.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-trash-can'></i></a></td>
                            <td><a href='editSkill.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-pencil'></i></a></td>
                            </tr>";
                        }
                    }

                    ?>
                    </table>

                </div>
                <a href="addSkill.php" class="btn btn-contact">Add a Skill </a>
            </section>

            <section class="section education" id="education">
                <h2 class="section-title title-center underline" data-title="Manage">Education</h2>
                <div class="education-container container table-container">

                    <?php
                    $select = "SELECT * FROM education";
                    $result = mysqli_query($conn, $select);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<h3 style='width: 100%; text-align:center;'>No data yet!</h3>";
                    } else {
                        echo '<table>
                        <tr>
                            <th>Institution</th>
                            <th>Degree</th>
                            <th>Timeline</th>
                            <th>Description</th>
                            <th colspan=2>Action</th>
                        </tr>';
                    }
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                            <td>" . $row['institution'] . "</td>
                            <td>" . $row['degree'] . "</td>
                            <td>" . $row['timeline'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td><a href='deleteEducation.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-trash-can'></i></a></td>
                            <td><a href='editEducation.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-pencil'></i></a></td>
                            </tr>";
                        }
                    }
                    ?>
                    </table>
                </div>
                <a href="addEducation.php" class="btn btn-contact">Add Education </a>
            </section>

            <section class="section activities" id="activities">
                <h2 class="section-title title-center underline" data-title="Manage">Activities</h2>
                <div class="activities-container container table-container">

                    <?php
                    $select = "SELECT * FROM extracurricular";
                    $result = mysqli_query($conn, $select);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<h3 style='width: 100%; text-align:center;'>No data yet!</h3>";
                    } else {
                        echo '<table>
                            <tr>
                                <th>Club</th>
                                <th>Work</th>
                                <th>Timeline</th>
                                <th>Description</th>
                                <th colspan=2>Action</th>
                            </tr>';
                    }
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                            <td>" . $row['club'] . "</td>
                            <td>" . $row['work'] . "</td>
                            <td>" . $row['timeline'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td><a href='deleteActivity.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-trash-can'></i></a></td>
                            <td><a href='editActivity.php?id=" . $row['id'] . "' class='delete'><i class='fa-solid fa-pencil'></i></a></td>
                            </tr>";
                        }
                    }
                    ?>
                    </table>
                </div>
                <a href="addActivity.php" class="btn btn-contact">Add Activity </a>
            </section>

            <div class="container grid"><input type="submit" id="reset" name="reset" value="Reset cookies" class="btn"></div>
        </div>
    </form>
    <?php
    mysqli_close($conn);
    ?>
    <script src="script/index-script.js"></script>
</body>

</html>