<!DOCTYPE html>
<?php
$conn = mysqli_connect('localhost:3307', 'root', '', 'portfolio_db');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Raufun Ahsan</title>
    <meta name="description" content="My personal portfolio website" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="img/logo.png" type="image/png" sizes="16x16" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="style/index-style.css" />
</head>

<body>
    <div class="switch-style"></div>

    <header class="header">
        <nav class="nav container">
            <a href="signin.php" class="nav-logo"><span class="first-letter">R</span>aufun</a>

            <input type="checkbox" id="nav-toggler">
            <label for="nav-toggler" class="nav-toggle"><i class="fa-solid fa-bars"></i></label>

            <ul class="nav-list">
                <li class="nav-item">
                    <a href="#home" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="#qualifications" class="nav-link">Qalifications</a>
                </li>
                <li class="nav-item">
                    <a href="#Expertise" class="nav-link">Expertise</a>
                </li>
                <li class="nav-item">
                    <a href="#skills" class="nav-link">Skills</a>
                </li>
                <li class="nav-item">
                    <a href="#projects" class="nav-link">Projects</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link">Contact</a>
                </li>
            </ul>

        </nav>
    </header>
    <!-- <div class="placeholder"></div> -->
    <section class="home" id="home">
        <div class="home-container container grid">
            <div class="home-content">
                <span class="home-small">Hello</span>
                <h1 class="home-title">
                    <span>I'm </span>Raufun Ahsan<br /><span class="typed">a developer</span><span class="cursor">|</span>
                </h1>
                <p class="home-desc">
                    I am programmer and a computer science student. I love
                    to code and solve problems. I am passionate about
                    learning new technologies and building new things.
                </p>
                <div class="home-btns">
                    <a class="btn" href="assets/cv.pdf" class="home-links">See my resume</a>
                    <a class="btn btn-transparent" href="#contact" class="home-links">Contact me</a>
                </div>
            </div>
            <div class="home-img-container">
                <img class="home-img" src="img/profile.png" alt="Raufun Ahsan" />
            </div>
        </div>
    </section>
    <section class="about section" id="about">
        <div class="about-container container grid">
            <div class="about-img-container">
                <img src="img/about.jpg" alt="Raufun" class="about-img" />
                <img src="img/about.jpg" alt="Raufun" class="about-img" />
                <img src="img/about.jpg" alt="Raufun" class="about-img" />
                <img src="img/about.jpg" alt="Raufun" class="about-img" />
            </div>
            <div class="about-content">
                <h2 class="section-title" data-title="Who am I?">
                    I'm a computer science student and
                    programming enthusiast.
                </h2>
                <p class="about-desc">
                    I am a passionate programmer and a problem solver. I
                    love to dabble in new technologies and gadgets. I am a
                    fast learner and I am always eager to learn new things.
                    I am a team player and I love to work in a team. I also
                    like playing video games, watching movies and reading
                    books.
                </p>
                <ul class="about-data grid">
                    <li class="data-item">
                        <h3 class="data-title">Name:</h3>
                        <span class="data-desc">Raufun Ahsan</span>
                    </li>
                    <li class="data-item">
                        <h3 class="data-title">From:</h3>
                        <span class="data-desc">Dhaka, Bangladesh</span>
                    </li>
                    <li class="data-item">
                        <h3 class="data-title">Born:</h3>
                        <span class="data-desc">2002</span>
                    </li>
                    <li class="data-item">
                        <h3 class="data-title">Email:</h3>
                        <a href="mailto:raufun.ahsan@gmail.com" class="data-desc about-link">raufun.ahsan@gmail.com</a>
                    </li>
                </ul>
                <div class="about-bottom">
                    <a href="" class="btn">Download my CV</a>
                    <div class="about-links">
                        <a href="https://www.linkedin.com/in/raufun-ahsan/" class="about-link"><i class="fa-brands fa-linkedin fa-xl"></i></a>
                        <a href="https://github.com/taut0logy/" class="about-link"><i class="fa-brands fa-github fa-xl"></i></a>
                        <a href="https://www.facebook.com/raufun.ahsan" class="about-link"><i class="fa-brands fa-facebook fa-xl"></i></a>
                        <a href="https://www.instagram.com/raufun_ahsan" class="about-link"><i class="fa-brands fa-instagram fa-xl"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Qualifications -->

    <section class="qualifications section" id="qualifications">
        <h2 class="section-title title-center underline" id="qualifications-title" data-title="My journey">
            Qualifications
        </h2>
        <div class="resume-container container grid">


            <!-- Education -->

            <div class="resume-group">

                <div class="resume-item-list">
                    <h3 class="resume-heading">Education</h3>
                    <?php
                    $select = "SELECT * FROM education";
                    $result = mysqli_query($conn, $select);
                    if (mysqli_num_rows($result) > 0) {
                        $items = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $items[] = $row;
                        }
                        function comp($a, $b)
                        {
                            $timeline1 = explode(' - ', $a['timeline']);
                            $timeline2 = explode(' - ', $b['timeline']);
                            $date1 = $timeline1[0];
                            $date2 = $timeline2[0];
                            if ($date1 == $date2) {
                                return 0;
                            } else {
                                return ($date1 < $date2) ? 1 : -1;
                            }
                        }
                        usort($items, 'comp');
                        for ($i = 0; $i < count($items); $i++) {
                            $row = $items[$i];
                            echo '<div class="resume-item">
                                    <div class="resume-header">
                                        <h3 class="resume-subtitle">' . $row['institution'] . '</h3>' .
                                (($i == 0 || $i == count($items) - 1) ? '<span class="resume-icon">+</span>' : '<span class="resume-icon">-</span>') .
                                '</div>
                                    <div class="resume-content">
                                        <div class="resume-date-title">
                                            <h3 class="resume-title">' . $row['degree'] . '</h3>
                                            <span class="resume-date">' . $row['timeline'] . '</span>
                                        </div>
                                        <p class="resume-desc">
                                            ' . $row['description'] . '
                                        </p>
                                    </div>
                                </div>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Extra Curricular -->

            <div class="resume-group">

                <div class="resume-item-list">
                    <h3 class="resume-heading">Extra Curricular Activities</h3>

                    <?php
                    $select = "SELECT * FROM extracurricular";
                    $result = mysqli_query($conn, $select);
                    if (mysqli_num_rows($result) > 0) {
                        $items = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $items[] = $row;
                        }
                        usort($items, 'comp');
                        for ($i = 0; $i < count($items); $i++) {
                            $row = $items[$i];
                            echo '<div class="resume-item">
                                <div class="resume-header">
                                    <h3 class="resume-subtitle">' . $row['club'] . '</h3>' .
                                (($i == 0 || $i == count($items) - 1) ? '<span class="resume-icon">+</span>' : '<span class="resume-icon">-</span>') .
                                '</div>
                                <div class="resume-content">
                                    <div class="resume-date-title">
                                        <h3 class="resume-title">' . $row['work'] . '</h3>
                                        <span class="resume-date">' . $row['timeline'] . '</span>
                                    </div>
                                    <p class="resume-desc">
                                        ' . $row['description'] . '
                                    </p>
                                </div>
                            </div>';
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </section>

    <!-- Expertise -->

    <section class="expertise section" id="Expertise">

        <h2 class="section-title title-center underline" data-title="Expertise">Things I'm good at</h2>

        <div class="expertise-container container grid">

            <div class="expertise-item">
                <i class="expertise-icon fa-brands fa-android"></i>
                <h3 class="expertise-title">Android App Development</h3>
                <p class="expertise-desc">
                    I have been developing android apps for 2 years. I have
                    developed various apps and games using Java and Kotlin.
                </p>
                <span class="type-icon"><i class="fa-solid fa-mobile-screen"></i></span>
            </div>

            <div class="expertise-item">
                <i class="fa-brands fa-java expertise-icon"></i>
                <h3 class="expertise-title">Desktop App Development</h3>
                <p class="expertise-desc">
                    I have eperience in developing desktop applications using Java. I have developed various applications using JavaFX and Swing.
                </p>
                <span class="type-icon"><i class="fa-solid fa-desktop"></i></span>
            </div>

            <div class="expertise-item">
                <i class="expertise-icon fa-brands fa-react"></i>
                <h3 class="expertise-title">Web App Development</h3>
                <p class="expertise-desc">
                    I have also developed functional web applications using React. I have developed various web applications using React and Node.js.
                </p>
                <span class="type-icon"><i class="fa-solid fa-globe"></i></span>
            </div>

            <div class="expertise-item">
                <i class="expertise-icon fa-solid fa-c"></i>
                <h3 class="expertise-title">Console App Development</h3>
                <p class="expertise-desc">
                    I have developed various modular console applications using C and C++. They include various data structures and algorithms.
                </p>
                <span class="type-icon"><i class="fa-solid fa-terminal"></i></span>
            </div>
        </div>

    </section>

    <!-- Skills -->

    <section class="skills section" id="skills">
        <h2 class="section-title title-center underline" data-title="My talent">Professional Skills</h2>
        <div class="skills-container container grid">

            <?php
            $select = "SELECT * FROM skills";
            $result = mysqli_query($conn, $select);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="skills-item">
                        <div class="skills-title">
                            <h3 class="skills-name">' . $row['name'] . '</h3>
                            <span class="skills-no">' . $row['percentage'] . '%</span>
                        </div>
                        <p class="skills-desc">' . $row['description'] . '</p>
                        <div class="skills-bar">
                            <div class="skills-percentage" style="width: ' . $row['percentage'] . '%;"><span></span></div>
                        </div>
                    </div>';
                }
            }
            ?>

        </div>
    </section>
    <section class="projects section" id="projects">
        <h2 class="section-title title-center underline" data-title="My Portfolio">Recent Projects</h2>
        <div class="project-container container grid">

            <?php

            $select = "SELECT * FROM projects";
            $result = mysqli_query($conn, $select);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="project-card">
                        <img src="img/' . $row['photo'] . '" alt="" class="project-img">
                        <div class="project-details">
                            <h3 class="project-title">' . $row['title'] . '</h3>
                            <p class="prject-desc">' . $row['description'] . '</p>
                            <a href="' . $row['link'] . '" class="project-link">GitHub <i class="fa-solid fa-square-arrow-up-right"></i></a>
                        </div>
                    </div>';
                }
            }
            ?>
        </div>
    </section>
    <section class="contact section" id="contact">
        <h2 class="section-title title-center underline" data-title="Get in touch">Contact Me</h2>
        <div class="contact-container container grid">
            <div class="contact-details">

                <div class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <div class="contact-item-details">
                        <h3 class="contact-title">Phone</h3>
                        <span class="contact-data">+880 1533 865 121</span><br>
                        <span class="contact-data">+880 1840 261 323</span>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <div class="contact-item-details">
                        <h3 class="contact-title">Email</h3>
                        <span class="contact-data"><a href="mailto:raufun.ahsan@gmail.com">raufun.ahsan@gmail.com</a></span><br>
                        <span class="contact-data"><a href="mailto:ahsan20070030@stud.kuet.ac.bd">ahsan20070030@stud.kuet.ac.bd</a></span>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <div class="contact-item-details">
                        <h3 class="contact-title">Address</h3>
                        <span class="contact-data"><a href="https://maps.app.goo.gl/6njpZLjVyJD7whadA">762/B, Monipur, Mirpur, Dhaka-1216, Bangladesh</a></span>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fa-brands fa-whatsapp"></i>
                    <div class="contact-item-details">
                        <h3 class="contact-title">Whatsapp</h3>
                        <span class="contact-data"><a href="https://wa.me/8801533865121?text=Hi%20Raufun%21">+880 1533 865 121</a></span>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fa-brands fa-discord"></i>
                    <div class="contact-item-details">
                        <h3 class="contact-title">Discord</h3>
                        <span class="contact-data"><a href="https://discord.gg/wx56M2EX">raufun1801</a></span>
                    </div>
                </div>

                <div class="contact-item">
                    <i class="fa-brands fa-telegram"></i>
                    <div class="contact-item-details">
                        <h3 class="contact-title">Telegram</h3>
                        <span class="contact-data"><a href="https://t.me/ra_1801">@RA_1801</a></span>
                    </div>
                </div>

            </div>

            <form action="contact.php" method="post" class="contact-form">
                <div class="form-heading">Send me a message</div>
                <div class="input-group">
                    <div class="form-input"><input class="input-control" name="name" type="text" placeholder="Name" required></div>
                    <div class="form-input"><input class="input-control" name="email" type="email" placeholder="Email" required></div>
                </div>
                <div class="form-input"><input class="input-control" name="subject" type="text" placeholder="Subject" required></div>
                <div class="form-input"><textarea class="input-control textarea" id="message" name="message" placeholder="Message (must be within 500 characters)" rows="30" cols="30" required></textarea></div>
                <input type="submit" name="submit" value="Send Message" class="btn btn-contact">

            </form>

        </div>
    </section>

    <footer class="footer">
        <div class="footer-container container">
            <div class="footer-content">

                <div class="footer-bottom">
                    <span class="footer-copy">© 2024 Raufun Ahsan. All rights reserved</span>
                </div>
            </div>


            <div class="footer-links">
                <a href="https://www.linkedin.com/in/raufun-ahsan/" class="footer-link"><i class="fa-brands fa-linkedin fa-xl"></i></a>
                <a href="https://github.com/taut0logy" class="footer-link"><i class="fa-brands fa-github fa-xl"></i></a>
                <a href="https://www.facebook.com/raufun.ahsan" class="footer-link"><i class="fa-brands fa-facebook fa-xl"></i></a>
                <a href="https://www.instagram.com/raufun_ahsan" class="footer-link"><i class="fa-brands fa-instagram fa-xl"></i></a>
            </div>

        </div>
    </footer>

    <script src="script/index-script.js" async defer></script>
</body>

</html>
<?php
mysqli_close($conn);
?>