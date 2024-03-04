<?php
session_start();
$connection=mysqli_connect('localhost:3307','root','','portfolio_db');
if(!$connection){
    die('Connection failed: '.mysqli_connect_error());
}
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
            border-radius: 40px;
            padding: 24px;
            margin-bottom: 30px;
            /* color: var(--font); */
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
        .projects, .skills {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .project-container {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .edit-delete {
            display: flex;
            width: 75%;
            justify-content: space-evenly;
            align-items: center;
        }

        .edit-delete .delete {
            font-size: 2rem;
            margin:0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid var(--border-color);

        }

        th {
            font-size: 1.5rem;
            font-weight: 600;
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 1rem;
            border: 2px solid var(--border-color);
            text-align: center;
        }

        td:nth-child(2) {
            max-width: 50%;
        }
        tr:nth-child(odd) {
            background: var(--background-color);
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
                        <a href="#Messages" class="nav-link">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a href="#Projects" class="nav-link">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="#Skills" class="nav-link">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a href="#Education" class="nav-link">Education</a>
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
            
            $select="SELECT * FROM messages";
            $result=mysqli_query($connection,$select);
            if(mysqli_num_rows($result)==0){
                echo "<h3>No messages yet!</h3>";
            }
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    echo "<div class='message-content bubble left'>
                    <div class='span1'>From: <span class='span2'>".$row['name']."</span></div>
                    <div class='span1'>Email: <span class='span2'>".$row['email']."</span></div>
                    <div class='span1'>Subject: <span class='span2'>".$row['subject']."</span></div>
                    <span class='span1'>Message: </span>
                    <div class='message-text'>".$row['message']."</div>
                    <div class= 'last'>
                    <div class='span1'>Sent: <span class='span2'>".$row['time']."</span></div>
                    <a href='deleteMessage.php?id=".$row['id']."' class='delete'><i class='fa-solid fa-trash-can'></i></a>
                    </div>
                </div>";
                }
            }
            //mysqli_close($connection);
            ?>     
            </div>

        </section>

        <section class="section projects" id="projects">
            <h2 class="section-title title-center underline" data-title="Manage">Projects</h2>
            <div class="project-container container grid">
                <?php
                // $connection=mysqli_connect('localhost:3307','root','','portfolio_db');
                // if(!$connection){
                //     die('Connection failed: '.mysqli_connect_error());
                // }
                $select="SELECT * FROM projects";
                $result=mysqli_query($connection,$select);
                if(mysqli_num_rows($result)==0){
                    echo "<h3 style='width: 100%; text-align:center;'>No projects yet!</h3>";
                }
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        $image=$row['photo'];
                        header('Content-type: image/jpeg');
                        echo "<div class='project-card'>
                        <img src='img/".$image."' alt='project image' class='project-img'>
                        <div class='project-details'>
                            <h3 class='project-title'>".$row['title']."</h3>
                            <p class='prject-desc'>".$row['description']."</p>
                            <h3>Project link: </h3>
                            <span class='project-link-text'>".$row['link']."</span>
                            <span class='edit-delete'><a href='deleteProject.php?id=".$row['id']."' class='delete'><i class='fa-solid fa-trash-can'></i></a>
                            <a href='editProject.php?id=".$row['id']."' class='delete'><i class='fa-solid fa-pencil'></i></a>
                            </span>

                        </div>
                    </div>";
                    }
                }
                // mysqli_close($connection);
                ?>
                
            </div>
            <a href="addProject.php" class="btn btn-contact">Add a project </a>
        </section>

        <section class="section skills" id="skills">
            <h2 class="section-title title-center underline" data-title="Manage">Skills</h2>
            <div class="skills-container container grid">
                
                    <?php
                    $select="SELECT * FROM skills";
                    $result=mysqli_query($connection,$select);
                    if(mysqli_num_rows($result)==0){
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
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>
                            <td>".$row['name']."</td>
                            <td>".$row['description']."</td>
                            <td>".$row['percentage']."</td>
                            <td colspan=2><span><a href='deleteSkill.php?id=".$row['id']."' class='delete'><i class='fa-solid fa-trash-can'></i></a>
                            <a href='editSkill.php?id=".$row['id']."' class='delete'><i class='fa-solid fa-pencil'></i></a></span>
                            </tr>";
                        }
                    }
                    ?>
                </table>
                
            </div>
            <a href="addSkill.php" class="btn btn-contact">Add a Skill </a>
        </section>



        
        <div class="container grid"><input type="submit" id="reset" name="reset" value="Reset cookies" class="btn"></div>
        </div>
    </form>

    <script src="script/index-script.js"></script>
</body>

</html>