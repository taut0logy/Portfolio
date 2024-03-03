<?php
    session_start();

    if(isset($_POST['logout'])){
        session_destroy();
        header('Location: index.php');
    }

    if(isset($_POST['reset'])){
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
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        />
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
        </style>
    <title>Admin Dashboard</title>
</head>
<body>
<form action="dashboard.php" method="post">
<header class="header">
            <nav class="nav container">
                <a href="index.php" class="nav-logo"
                    ><span class="first-letter">D</span>ashboard</a
                >

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
                        <a href="#Skills" class="nav-link"
                            >Skills</a
                        >
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
    <section class="section messages" id="messages">
    <h2 class="section-title title-center underline" data-title="Welcome Raufun!">Messages for you</h2>
    <div class="message-container container grid">
        <div class="message-content">
            <h3 class="from">From: <span></span></h3>
        </div>
    </div>
    </section>

    <section class="section projects" id="projects">
    <h2 class="section-title title-center underline" data-title="Projects">Projects</h2>
    <div class="project-container container grid">
        <div class="project-content">
            <h3 class="project-title">Project Title</h3>
            <p class="project-description">Project Description</p>
            <a href="#" class="project-link">View Project</a>
        </div>
    </div>

    </section>
    
    <section class="section skills" id="skills">
    <h2 class="section-title title-center underline" data-title="Skills">Skills</h2>
    <div class="skills-container container grid">
        <div class="skills-content">
            <h3 class="skills-title">Skill Title</h3>
            <p class="skills-description">Skill Description</p>
        </div>
    </div>
    </section>

    <section class="section education" id="education">
    <h2 class="section-title title-center underline" data-title="Education">Education</h2>
    <div class="education-container container grid">
        <div class="education-content">
            <h3 class="education-title">Education Title</h3>
            <p class="education-description">Education Description</p>
        </div>
    </div>
    </section>

    <section class="section activities" id="activities">
    <h2 class="section-title title-center underline" data-title="Activities">Activities</h2>
    <div class="activities-container container grid">
        <div class="activities
        -content">
            <h3 class="activities-title">Activities Title</h3>
            <p class="activities-description">Activities Description</p>
        </div>
    </div>

    </section>
    <div class="container grid"><input type="submit" id="reset" name="reset" value="Reset cookies" class="btn"></div>
</form>

    <script src="script/index-script.js"></script>
</body>
</html>