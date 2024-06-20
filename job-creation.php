<?php
session_start();

if (!isset($_SESSION['login']) || !$_SESSION['login'] == true) {
    header('Location: ./auth.php?error[]=You need to login first');
}

if (!isset($_SESSION['type']) || $_SESSION['type'] != 'employer') {
    header('Location: ./index.php?error[]=You are not authorized to access this page');
}

if (isset($_POST['submit'])) {
    require_once 'utils/db-conn.php';
    require_once 'utils/gen-id.php';

    $job_id = generateID('j');
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $salary = $_POST['salary'];
    $date = date('Y-m-d');
    $deadline = $_POST['deadline'];
    $description = $_POST['description'];
    $employment_type = $_POST['select'];
    $job_category = $_POST['category'];

    $sql = "INSERT INTO jobs (job_id, employer_id, title, description, job_category, posted_date, deadline, salary, employment_type ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $job_id, $user_id, $title, $description, $job_category, $date, $deadline, $salary, $employment_type);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('Location: job-creation.php?success[]=Job posted successfully');
        exit();
    } else {
        header('Location: job-creation.php?error[]=Failed to post job');
        exit();
    }
}

?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/job-creation.css">
    <link rel="stylesheet" href="src/css/theme.css">
    <link rel="stylesheet" href="src/css/navbar.css">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="src/css/home.css">
    <title>Post a Job</title>



    <script src="src/js/error.js"></script>
</head>

<body>
    <nav class="navbar-container">
        <?php require_once 'common/navbar.php'; ?>
    </nav>

    <form action="" method="post" autocomplete="off">
        <h2>Post a Job</h2><br>
        <label for="title">Job Title</label>
        <input type="text" id="title" name="title" required>

        <label for="salary">Salary</label>
        <input type="text" id="salary" name="salary" required>

        <label for="location">Deadline</label>
        <input type="date" id="deadline" name="deadline" required>

        <label for="category">Job Category</label>
        <select name="category">
            <option value="education">Education</option>
            <option value="technology">Technology</option>
            <option value="advertising">Advertising & Marketing</option>
            <option value="banking">Banking & Finance</option>
            <option value="insurance">Insurance</option>
            <option value="tourism">Tourism</option>
            <option value="construction">Construction</option>
            <option value="health">Health Services</option>
            <option value="manufaturing">Manufaturing</option>
            <option value="telecommunication">Telecommunication</option>
            <option value="transportation">Transportation</option>
            <option value="Shipping">Shipping & Logistics</option>
        </select>

        <label>Employment Type</label>
        <input type="radio" id="option1" class="radio-input" name="select" value="full-time">
        <label for="option1" class="radio-label">Full Time</label>
        <input type="radio" id="option2" class="radio-input" name="select" value="part-time">
        <label for="option2" class="radio-label">Part Time</label>
        <br><br>

        <label for="requirements">Requirements/ Experiences</label>
        <textarea id="requirements" name="description" rows="4" cols="50"></textarea>

        <input type="submit" name="submit" value="Post">
        <input type="reset" value="Reset">
    </form>

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