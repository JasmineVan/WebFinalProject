<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "leader"){
?>

<head>
<title>Extend Task</title>
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

<?php 
    $extendID = $_GET['extendID'];
    $extendFrom = $_GET['extendFrom'];

    ?>
    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="extendTask2-handle.php" method="POST">
        <table class="d-flex table-dark table-borderless rounded w-25 h-25 justify-content-center p-2">
            <tr>
                <td>
                    <label for="dayExtend">Number of day</label>
                </td>
                <td>
                    <input type="number" name="dayExtend" id="dayExtend"  min="0" placeholder="Enter number of day...">
                </td>
            </tr>
            <tr>
                <td>
                    <!-- this is hiden value to identify task id to extend -->
                    <input type='hidden' name='extendID' value='<?=$extendID ?>'/>
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Save</button>
                </td>
                <td>
                    <!-- this is hiden value to identify day to extend task from -->
                    <input type='hidden' name='extendFrom' value='<?=$extendFrom ?>'/>
                </td>
            </tr>
        </table>
    </form>
    <?php
?>
</table>
<?php

}else{

}
?>


