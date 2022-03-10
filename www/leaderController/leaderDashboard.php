<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "leader"){
?>

<head>
<title>Leader Page</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../index.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../leaderController/leaderInformation.php"><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../leaderController/leaderDashboard.php">Task Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../leaderController/leaderInformation.php">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../leaderController/leaderDayoffRequest.php">Dayoff Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../leaderController/leaderDayoffManagement.php">Dayoff Management</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a  class="nav-link bg-danger rounded text-white" href="../loginController/logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <!-- new employee button -->
    <table>
        <tr>
            <td>
                <form action="../taskController/newTask2.php" method="POST">
                    <button type="submit" class="btn btn-success m-2">New task</button>
                </form>
            </td>
        </tr>
    </table>

    <?php
    //show list of task and employee
    require("../taskController/taskList2.php");
    ?>
</body>
<?php
	}else{
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
        <title>Login require</title>
    </head>
    <body>
        <h1 class="d-flex justify-content-center p-5">You have to login first to use this website</h1>
        <!-- login form -->
        <form class="d-flex justify-content-center p-5 w-auto h-auto" action="../loginController/login-handle.php" method="POST">
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
    }
?>

