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

    <!-- new employee form -->
    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="newEmployee-handle.php" method="post" onsubmit="return true">
        <table class="d-flex table-dark table-borderless rounded w-25 h-25 justify-content-center p-2">
            <tr>
                <td>
                    <label for="employeeID">Employee ID</label>
                </td>
                <td>
                    <input type="text" name="employeeID" id="employeeID" placeholder="Enter employee ID...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="employeeName">Employee name</label>
                </td>
                <td>
                    <input type="text" name="employeeName" id="employeeName" placeholder="Enter employee name...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="employeeDepartment">Department</label>
                </td>
                <td>
                    <input type="text" name="employeeDepartment" id="employeeDepartment" placeholder="Enter department...">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success">Add</button>
                </td>  
            </tr>
        </table>
    </form>	
</body>
<?php
	}else{
    
    }
?>
<?php ?>