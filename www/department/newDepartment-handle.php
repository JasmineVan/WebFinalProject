<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
?>

<head>
<title>New Department</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../department/newDepartment.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href=""><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../adminController/admin.php">Account Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../adminController/admin2.php">Department Management</a>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a  class="nav-link bg-danger rounded text-white" href="/login/logout.php">Logout</a>
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
    $departmentID = $_POST['departmentID'];
    $departmentName = $_POST['departmentName'];
    $departmentDescription = $_POST['departmentDescription'];
    $error = '';

    //validate input
    if(!isset($_POST['departmentID']) || !isset($_POST['departmentName']) || !isset($_POST['departmentDescription']) ){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 1: Information can not empty.</h3>
        </div>
        <?php
        die();
    }

    if(empty($_POST['departmentID']) || empty($_POST['departmentName']) || empty($_POST['departmentDescription'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 2: Please fill all information in this form.</h3>
        </div>
        <?php
        die();
    }

    //sql query
    $sql = "INSERT INTO department(DepartmentID, DepartmentName, DepartmentDescription) values ('$departmentID', '$departmentName', '$departmentDescription')";

    if (!$conn->query($sql)){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not insert department.</h3>
        </div>
        <?php
        die('Can not insert: ' . $conn->error);
    }else{
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-success d-flex justify-content-center w-50">Insert department successfully.</h3>
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