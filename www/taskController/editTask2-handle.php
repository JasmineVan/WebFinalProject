<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "leader"){
?>

<head>
<title>Edit Task</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../leaderController/leaderDashboard.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href=""><i class="fas fa-chevron-right"></i></a>
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

    <!-- handle here -->
    <?php
    //copnnect db
    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('Can not connect to database: ' . $conn->connect_error);
    }

    // form variables
    $editID = $_POST['editID'];

    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];

    //validate input
    if(!isset($_POST['taskName']) || !isset($_POST['taskDescription'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 1: Information can not empty.</h3>
        </div>
        <?php
        die();
    }

    if(empty($_POST['taskName']) || empty($_POST['taskDescription'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 2: Please fill all information in this form.</h3>
        </div>
        <?php
        die();
    }
    ?>

    <?php
    
	$sql = "UPDATE task SET TaskName = '$taskName', TaskDescription = '$taskDescription' WHERE TaskID = '$editID' ";
    if (!$conn->query($sql)){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not edit task.</h3>
        </div>
        <?php
        die('Can not edit task: ' . $conn->error);
    }else{
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-success d-flex justify-content-center w-50">Edit task done.</h3>
        </div>
        <?php
    }
    ?>

</body>

<?php
}
?>