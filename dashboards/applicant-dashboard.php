<?php

if(!isset($DASHBOARD) || !$DASHBOARD == true){
	header('Location: ../dashboard.php');
}

if (!isset($_SESSION['login']) || !$_SESSION['login'] == true) {
	header('Location: ../auth.php?error[]=You need to login first');
}

if ($_SESSION['type'] != "applicant") {
	header("../index.php");
}

require_once "utils/db-conn.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM applicants WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();

$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
	<link type="text/css" rel="stylesheet" href="../src/css/theme.css">
	<link type="text/css" rel="stylesheet" href="../src/css/main.css">
	<link type="text/css" rel="stylesheet" href="../src/css/navbar.css">
    <link type="text/css" rel="stylesheet" href="../src/css/applicant-card.css">
	<link type="text/css" rel="stylesheet" href="../src/css/profile.css">

	<script src="../src/js/profile.js"></script>
</head>

<body>
	<nav class="navbar-container">
		<?php require_once 'common/navbar.php'; ?>
	</nav>
	<div class="main-container">
		<div class="left-container">
			<nav class="left-nav">
				<ul>
					<li><a href="dashboard.php?tab=my-applications">My Applications</a></li>
					<li><a href="dashboard.php?tab=my-cvs">CVs</a></li>
					<li><a href="dashboard.php?tab=profile-settings">Profile Settings</a></li>
				</ul>
			</nav>
		</div>
		<div class="right-container">
			<?php
				if(!isset($_GET['tab']) || $_GET['tab'] == "profile-settings"){
					$_GET['tab'] = "profile-settings";
				}
				
				require_once "dashboards/applicant-".$_GET['tab'].".php";

			?>
		</div>
	</div>



</body>

</html>