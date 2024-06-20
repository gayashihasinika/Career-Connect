<ul class="navbar">
    <span>
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About</a></li>
        <?php
        if (isset($_SESSION['type'])) {
            if ($_SESSION['type'] == "applicant") {
                echo '<li><a href="vacancy.php">Jobs</a></li>';
            } elseif ($_SESSION['type'] == "employer") {
                echo '<li><a href="job-creation.php">Create Jobs</a></li>';
                
            }
        }
        ?>
    </span>
    <span>
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            echo '<li><a class="material-symbols-outlined" href="dashboard.php" title="Dashboard">dashboard</a></li>';
            echo '<li><a class="material-symbols-outlined" href="logout.php" title="Logout">logout</a></li>';
        } else {
            echo '<li><a class="material-symbols-outlined" href="auth.php" title="Login">login</a></li>';
        }
        ?>
    </span>
</ul>