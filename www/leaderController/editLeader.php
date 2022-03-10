<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "leader"){
?>

<head>
<title>Edit Information</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../leaderController/leaderInformation.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href=""><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../leaderController/leaderDashboard.php">Task Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../leaderController/leaderInformation.php">Personal Information</a>
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
    <!-- edit form -->
    <?php 
    $editID = $_GET['editID']; 
    $oldPasswordToCompare = $_GET['oldPasswordToCompare']; 
    // echo $editID;
    // echo $oldPasswordToCompare;
    ?>
    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="editLeader-handle.php" method="POST">
        <table class="d-flex table-dark table-borderless rounded w-25 h-25 justify-content-center p-2">
            <tr>
                <td>
                    <label for="oldPassword">Old Password</label>
                </td>
                <td>
                    <input type="password" name="oldPassword" id="oldPassword" placeholder="Enter old password...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="newPassword">New Password</label>
                </td>
                <td>
                    <input type="password" name="newPassword" id="newPassword" placeholder="Enter new password...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="retypeNewPassword">Retype Password</label>
                </td>
                <td>
                    <input type="password" name="retypeNewPassword" id="retypeNewPassword" placeholder="Retype new password...">
                </td>
            </tr>
            <tr>
                <td>
                    <!-- this is hiden value to identify employee id to edit -->
                    <input type='hidden' name='editID' value='<?=$editID ?>'/>
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Save</button>
                </td>
                <td>
                    <!-- this is hiden value to identify old password to compare -->
                    <input type='hidden' name='oldPasswordToCompare' value='<?=$oldPasswordToCompare ?>'/>
                </td>
            </tr>
        </table>
    </form>
</body>

<?php
}
?>