<?php
	//login and req css jvs
	session_start();
	require("Requirement.php");
	//LOGED IN
	if(!isset($_SESSION['user'])){
		?>
		<!--nav-->
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>
			</ul>
		</nav>

		<!--no log in-->
		<head>
			<title>Login Require</title>
		</head>
		<body>
			<h1 class="d-flex justify-content-center p-5">You have to login first to use this website</h1>
			<!-- login form -->
			<form class="d-flex justify-content-center p-5 w-auto h-auto" action="loginController/login-handle.php" method="POST">
				<table class="d-flex table-dark table-borderless rounded w-25 h-25 justify-content-center p-2">
					<tr>
						<td>
							<label for="username">User name</label>
						</td>
						<td>
							<input type="text" name="user" id="username" placeholder="Enter your username...">
						</td>
					</tr>
					<tr>
						<td>
							<label for="password">Password</label>
						</td>
						<td>
							<input type="password" name="pass" id="password" placeholder="Enter your password...">
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="btn btn-success">Login</button>
						</td>
					</tr>
				</table>
			</form>	
			<script src="main.js"></script>
		</body>
		<?php
	//EMPLOYEE AND LEADER
	}else if($_SESSION['user'] == "leader"){
		// echo "this is what leader see";
		?>
		<head>
		<title>Home Page</title>
		</head>

		<body>
		<!--nav-->
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item ">
					<a class="nav-link disabled" href=""><i class="fas fa-chevron-left"></i></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="leaderController/leaderDashboard.php"><i class="fas fa-chevron-right"></i></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a  class="nav-link bg-danger rounded text-white" href="loginController/logout.php">Logout</a>
				</li>
			</ul>
		</nav>

		<?php
		//this is header
		require("components/header.php");
		?>

		<?php
		//this is corousel
		require("components/corousel3.php");
		?>

		<?php
		//this is footer
		require("components/footer.php");
		?>
		</body>
		<?php																						
	}else if($_SESSION['user'] != "admin"){
		// echo "this is what employee see";
		?>
		<head>
		<title>Home Page</title>
		</head>

		<body>
		<!--nav-->
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item ">
					<a class="nav-link disabled" href=""><i class="fas fa-chevron-left"></i></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="employeeController/employeeDashboard.php"><i class="fas fa-chevron-right"></i></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a  class="nav-link bg-danger rounded text-white" href="loginController/logout.php">Logout</a>
				</li>
			</ul>
		</nav>

		<?php
		//this is header
		require("components/header.php");
		?>

		<?php
		//this is corousel
		require("components/corousel2.php");
		?>
		
		<?php
		//this is footer
		require("components/footer.php");
		?>
		</body>
		<?php
	//ADMIN
	}else{
	?>
		<!--loged in-->
		<head>
		<title>Home Page</title>
		</head>

		<body>
		<!--nav-->
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item ">
					<a class="nav-link disabled" href=""><i class="fas fa-chevron-left"></i></a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="adminController/admin.php"><i class="fas fa-chevron-right"></i></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a  class="nav-link bg-danger rounded text-white" href="loginController/logout.php">Logout</a>
				</li>
			</ul>
		</nav>

		<?php
		//this is header
		require("components/header.php");
		?>

		<?php
		//this is corousel
		require("components/corousel.php");
		?>
		
		<?php
		//this is footer
		require("components/footer.php");
		?>
	</body>
	<?php
	}
?>