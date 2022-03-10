<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
?>

<head>
<title>Department Detail Information</title>
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
    <!-- edit form -->
    <?php $editID = $_GET['editID']; ?>
    <?php $oldName = $_GET['oldName']; ?>

    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="editDepartment-handle.php" method="POST">
        <table class="d-flex table-dark table-borderless rounded w-25 h-25 justify-content-center p-2">
            <tr>
                <td>
                    <label for="departmentName">Department name</label>
                </td>
                <td>
                    <input type="text" name="departmentName" id="departmentName" placeholder="Enter department name...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="departmentDescription">Description</label>
                </td>
                <td>
                    <input type="text" name="departmentDescription" id="departmentDescription" placeholder="Enter description...">
                </td>
            </tr>
            <tr>
                <td>
                    <!-- this is hiden value to identify department id to edit -->
                    <input type='hidden' name='editID' value='<?=$editID ?>'/>
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Save</button>
                </td>
                <td>
                    <!-- this is hiden value to identify department name to edit -->
                    <input type='hidden' name='oldName' value='<?=$oldName ?>'/>
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
