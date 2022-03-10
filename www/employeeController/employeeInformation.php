<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] != "admin" && $_SESSION['user'] != "leader"){
?>

<head>
<title>Personal Information</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../employeeController/employeeDashboard.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../employeeController/employeeDayoffRequest.php"><i class="fas fa-chevron-right"></i></a>
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

    <?php
    // get leader id
    $currentUser = $_SESSION['user'];
    ?>

    <!-- avatar display -->
    <?php require("employeeAvatar-handle.php"); ?>

    <!-- info -->
    <?php require("employeeInformation-handle.php"); ?>

    <!-- upload avt button -->
    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="../fileController/avatarUpload.php" method="POST" enctype="multipart/form-data">
        <table class="d-flex table-light table-borderless rounded w-40 h-40 justify-content-center p-2">
            <tr>
                <td>
                    <label for="avatar">Avatar</label>
                </td>
                <td>
                    <input accept="image/*" type="file" name="avatar" id="avatar">
                </td>
            </tr>
            <tr>
                <td>
                    <!-- this is hiden value to identify employee id to edit -->
                    <input type='hidden' name='editID' value='<?=$currentUser ?>'/>
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Change</button>
                </td>
            </tr>
        </table>
    </form>
</body>

<?php
}
?>