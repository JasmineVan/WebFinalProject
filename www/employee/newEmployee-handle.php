<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
?>

<head>
<title>New Employee</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../adminController/admin.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href=""><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../adminController/admin.php">Account Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../adminController/admin2.php">Department Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../adminController/admin3.php">Dayoff Management</a>
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
    //database connection
    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error){
        die("Can not connect to database". $conn->connect_error);
    }

    // form variables
    $employeeID = $_POST['employeeID'];
    $employeeName = $_POST['employeeName'];
    $employeeDepartment = $_POST['employeeDepartment'];
    $error = '';

    //validate input
    if(!isset($_POST['employeeID']) || !isset($_POST['employeeName']) || !isset($_POST['employeeDepartment']) ){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 1: Information can not empty.</h3>
        </div>
        <?php
        die();
    }

    if(empty($_POST['employeeID']) || empty($_POST['employeeName']) || empty($_POST['employeeDepartment'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 2: Please fill all information in this form.</h3>
        </div>
        <?php
        die();
    }

    //sql query
    $sql = "INSERT INTO employee(EmployeeID, EmployeeName, AccountPassword, Email, Department, LeaderFlag, AvatarPath) 
    values ('$employeeID', '$employeeName', '$employeeID', CONCAT('$employeeID','@gmail.com'), '$employeeDepartment', '0', '../uploads/avatar.jpg');
            INSERT INTO dayoff(EmployeeID, DateRequest, Reason, RequestStatus) VALUES('$employeeID', '2021-01-01', 'The first request was created by system', '0')
    ";

    if (!$conn->multi_query($sql)){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not insert employee.</h3>
        </div>
        <?php
        die('Can not insert: ' . $conn->error);
    }else{
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-success d-flex justify-content-center w-50">Insert employee successfully.</h3>
        </div>
        <?php
        // echo "Inserted: " . $conn->insert_id;
    }

    ?>
</body>
<?php
	}else{
    
    }
?>
<?php ?>