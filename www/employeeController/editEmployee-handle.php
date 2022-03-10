<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] != "admin" && $_SESSION['user'] != "leader"){
?>

<head>
<title>Edit Information</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../employeeController/employeeInformation.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href=""><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../employeeController/employeeDashboard.php">Task Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../employeeController/employeeInformation.php">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../employeeController/employeeDayoffRequest.php">Dayoff Request</a>
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
    $oldPasswordToCompare = $_POST['oldPasswordToCompare'];

    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $retypeNewPassword = $_POST['retypeNewPassword'];

    //validate input
    if(!isset($_POST['oldPassword']) || !isset($_POST['newPassword']) || !isset($_POST['retypeNewPassword']) ){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 1: Information can not empty.</h3>
        </div>
        <?php
        die();
    }

    if(empty($_POST['oldPassword']) || empty($_POST['newPassword']) || empty($_POST['retypeNewPassword'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 2: Please fill all information in this form.</h3>
        </div>
        <?php
        die();
    }
    
    // not match old password
    if($_POST['oldPassword'] != $oldPasswordToCompare){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Old password does not correct.</h3>
        </div>
        <?php
        die();
    }

    // retype not macth
    if($_POST['newPassword'] != $_POST['retypeNewPassword']){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Retype password does not match.</h3>
        </div>
        <?php
        die();
    }
    ?>

    <?php
    
	$sql = "UPDATE employee SET AccountPassword = '$newPassword' WHERE EmployeeID = '$editID' ";
    if (!$conn->query($sql)){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not change password.</h3>
        </div>
        <?php
        die('Can not change password: ' . $conn->error);
    }else{
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-success d-flex justify-content-center w-50">Change password done.</h3>
        </div>
        <?php
    }
    ?>

</body>

<?php
}
?>