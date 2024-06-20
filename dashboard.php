<?php
session_start();

$DASHBOARD = true;

if (!isset($_SESSION['login']) || !$_SESSION['login'] == true) {
    header('Location: ./auth.php?error[]=You need to login first');
}

require_once 'utils/db-config.php';

$user_type = $_SESSION['type'];

?>

<html>

<head>
    <link type="text/css" rel="stylesheet" href="src/css/theme.css">
    <link type="text/css" rel="stylesheet" href="src/css/main.css">
    <link type="text/css" rel="stylesheet" href="src/css/navbar.css">
    <link type="text/css" rel="stylesheet" href="src/css/profile.css">
    <link type="text/css" rel="stylesheet" href="src/css/profile-image.css">
    <link type="text/css" rel="stylesheet" href="src/css/applicant-card.css">

    <script src="src/js/jquery-3.7.1.min.js"></script>
    <script src="src/js/profile-image.js"></script>
    <script src="src/js/profile.js"></script>
    <script src="src/js/error.js"></script>
</head>

<body>
    <?php
    if ($user_type == "applicant") {
        require_once "dashboards/applicant-dashboard.php";
    } elseif ($user_type == "employer") {
        require_once "dashboards/employer-dashboard.php";
    } elseif ($user_type == "admin") {
        require_once "dashboards/admin-dashboard.php";
    } else {
        echo "Invalid User Type";
    } ?>

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