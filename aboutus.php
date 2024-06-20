<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="src/css/theme.css">
    <link rel="stylesheet" type="text/css" href="src/css/main.css">
    <link rel="stylesheet" type="text/css" href="src/css/home.css">
    <link rel="stylesheet" type="text/css" href="src/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="src/css/aboutus.css">

    <script src="src/js/jquery-3.7.1.min.js"></script>
    <script src="src/js/error.js"></script>
</head>

<body>
    <nav class="navbar-container">
        <?php require_once 'common/navbar.php'; ?>
    </nav>
    <header>
        <h1>Welcome to Career Connect</h1>
    </header>

    <section>
        <h2>Our Story</h2>
        <p>Imagine a world where every career move feels like the next chapter in an epic adventure...</p>

        <h2>Our Mission</h2>
        <p>Our mission is to revolutionize the job recruitment process by connecting talented individuals with potential
            opportunities. We aim to create a seamless experience for both job seekers and employers, making the hiring
            process more efficient and effective.</p>

        <h2>Our Vision</h2>
        <p>Our vision is to become the go-to platform for job recruitment, providing a comprehensive solution for both
            job seekers and employers. We strive to create a community where talent meets opportunity, fostering
            professional growth and development.</p>

        <h2>What Sets Us Apart</h2>
        <p><strong>People-Centric Approach:</strong> We recognize that each resume represents a distinct person....</p>
        <p><strong>Tech Meets Heart:</strong> In a society where algorithms reign supreme, we provide a personal
            approach to the hiring process....</p>
        <p><strong>Innovation at Every Turn:</strong> We excel in innovation, continuously adapting to keep up with the
            constantly changing environment....</p>

        <h2>Our Team</h2>
        <p>At Career Connect, a dedicated team of enthusiastic individuals works tirelessly to transform the job
            recruitment process. We are not just experts
            in our fiel d; we are also creators of dreams, facilitators of connections, and advocates for professional
            advancement. Meet the people who are leading
            our efforts to link talent with potential opportunities.</p>

        <h2>Join the our Family</h2>
        <p>Whether you're a job seeker searching for the next big leap or an employer looking for the perfect addition
            to your team...</p>

    </section>

</body>
<div class="hero-profile">
</div>
<section id="contact" class="contact">
    <div class="container-contact">
        <div class="content">
            <div class="left-side">

                <div class="topic-text">Contact Information</div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+94 707654321</div>

                    <div class="email details">
                        <i class="fas fa-envelope"></i>
                        <div class="topic">Email</div>
                        <div class="text-one">careerconnect@gmail.com</div>
                    </div>

                    <div class="Time">
                        <i class=" fas fa-clock"></i>
                        <div class="topic">Time</div>
                        <div class="text-one">24hrs</div>
                    </div>
                </div>

            </div>
            <div class="right-side">
                <div class="topic-text">Contact-Us</div>
                <form action="forum.php" method="post">
                    <div class="input-box">
                        <input type="text" placeholder="Enter your name" id="Name" name="Name" />
                    </div>
                    <div class="input-double">
                        <div class="input-box">
                            <input type="text" placeholder="Enter your email" id="email" name="email" />
                        </div>
                        <div class="input-box">
                            <input type="text" placeholder="Enter Your Number" id="number" name="number" />
                        </div>
                    </div>
                    <div class="input-box message-box">
                        <textarea placeholder="Enter your message" id="message" name="message"></textarea>
                    </div>
                    <div class="button">
                        <input type="submit" value="Send Now" name="submit" />
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
<div class="error-container" id="error-container">
    <?php
        if (isset($_GET['error'])) {
            $errors = $_GET['error'];

            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
        if (isset($_GET['success'])) {
            $successes = $_GET['success'];

            foreach ($successes as $success) {
                echo "<p class='success'>$success</p>";
            }
        }
        ?>
</div>
</body>