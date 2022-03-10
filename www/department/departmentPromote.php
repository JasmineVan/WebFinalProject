<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
?>

<head>
<title>Department Promote</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../adminController/admin2.php"><i class="fas fa-chevron-left"></i></a>
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
            <li class="nav-item">
                <a class="nav-link " href="../adminController/admin3.php">Dayoff Management</a>
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
    $employeeID = $_GET['employeeID'];
    $departmentName = $_GET['departmentName'];
    // echo $employeeID;
    // echo $departmentName;

    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('Can not connect to database: ' . $conn->connect_error);
    }

    // query - clear first - then insert correct
    $sql = "UPDATE employee SET LeaderFlag = '0' WHERE Department = '$departmentName'; 
            UPDATE department SET DepartmentLeader = '' WHERE DepartmentName = '$departmentName';
            UPDATE employee SET LeaderFlag = '1' WHERE EmployeeID = '$employeeID';
            UPDATE department SET DepartmentLeader = '$employeeID' WHERE DepartmentName = '$departmentName'
        ";

    //use multi query instead to excute 2 or more queries in my sql 
    if (!$conn->multi_query($sql)){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not promote.</h3>
        </div>
        <?php
        die('Can not promote: ' . $conn->error);
    }else{
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-success d-flex justify-content-center w-50">Promote successfully.</h3>
        </div>
        <?php
    }

?>
</table>
</body>
<?php
	}else{
    
    }
?>
<?php ?>
