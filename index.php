<?php
session_start();
require_once 'utils/db-conn.php';

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
  //echo "You are logged in as ".$_SESSION['user_id'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>CAREER Connect</title>
  <link rel="stylesheet" type="text/css" href="src/css/footer.css">
  <link rel="stylesheet" type="text/css" href="src/css/theme.css">
  <link rel="stylesheet" type="text/css" href="src/css/main.css">
  <link rel="stylesheet" type="text/css" href="src/css/home.css">
  <link rel="stylesheet" type="text/css" href="src/css/navbar.css">

  <script src="src/js/error.js"></script>
</head>

<body>

  <nav class="navbar-container">
    <?php require_once 'common/navbar.php'; ?>
  </nav>

  <div class="container">

    <div class="hero">
      <img style=opacity:0.9; src=" src/img/images.jpeg" width="300" height="300">
      <div class="hero-text">
        <h1><span>
            Welcome <br />to
          </span> <br><br><br>
          <mark>Career Connect</mark>
        </h1>
      </div>
    </div>

    <div class="Row">
      <div class="column-1">
        <div class="card">
          <h3>For<b> Applicants</b></h3>
          <p>Explore job openings from various employers using Career Me.<br />
   Select the opportunities that match your interests and apply.<br />
   Track the progress of your applications.
          </p>
        </div>
      </div>
      <div class="column-2">
        <div class="card">
          <h3>For <b> employees</b></h3>
          <p>Post job opportunities to find the right talent for your organization.<br />
   Edit, update, or delete your job listings as needed.<br />
   Review applications from qualified candidates.</p>
        </div>
      </div>
    </div>

  </div>
  <div class="counts">
    <div class="count-element">
      <h1>200+</h1>
      <span>Employees</span>
    </div>
    <div class="count-element">
      <h1>500+</h1>
      <span>Careers</span>
    </div>
    <div class="count-element">
      <h1>400+</h1>
      <span>Success</span>
    </div>
  </div>

  </div>

  <div class="footer">
    <?php require_once 'common/footer.php'; ?>
  </div>
  </div>

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
</html>