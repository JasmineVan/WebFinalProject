<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] != "admin" && $_SESSION['user'] != "leader"){
?>

<head>
<title>Document Upload</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../employeeController/employeeDashboard.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href=""><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../employeeController/employeeDashboard.php">Task Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../employeeController/employeeInformation.php">Personal Information</a>
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
    $taskID = $_GET['editID'];
    ?>
    <!-- new task form -->
    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="../fileController/upDocument-handle.php" method="POST"  enctype="multipart/form-data">
        <table class="d-flex table-dark table-borderless rounded w-50 h-50 justify-content-center p-2">
            <tr>
                <td>
                    <label for="document">Document</label>
                </td>
                <td>
                    <input type="file" name="document" id="document">
                </td>
            </tr>
            <tr>
                <td>
                    <!-- this is hiden value to identify task id-->
                    <input type='hidden' name='taskID' value='<?=$taskID ?>'/>
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Add</button>
                </td>
            </tr>
        </table>
    </form>
    

</body>

<?php
}
?>