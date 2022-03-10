<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "leader"){
?>

<head>
<title>Dayoff Request</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../leaderController/leaderDayoffRequest.php"><i class="fas fa-chevron-left"></i></a>
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
                <a class="nav-link " href="../leaderController/leaderInformation.php">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../leaderController/leaderDayoffRequest.php">Dayoff Request</a>
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
    $requestID = $_GET['requestID'];
    ?>
    <!-- request form -->
    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="../dayoffController/newRequest2-handle.php" method="POST"  enctype="multipart/form-data">
        <table class="d-flex table-dark table-borderless rounded w-50 h-50 justify-content-center p-2">
            <tr>
                <td>
                    <label for="quantity">Quantity</label>
                </td>
                <td>
                    <input type="number" min="0" name="quantity" id="quantity" placeholder="Enter dayoff quantity...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="reason">Reason</label>
                </td>
                <td>
                    <input type="text" name="reason" id="reason" placeholder="Enter reason...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="attach">Attachment</label>
                </td>
                <td>
                    <input type="file" name="attach" id="attach">
                </td>
            </tr>
            <tr>
                <td>
                <!-- this is hiden value to identify department id to edit -->
                    <input type='hidden' name='requestID' value='<?=$requestID ?>'/>
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Send</button>
                </td>
            </tr>
        </table>
    </form>

    <?php
    // handle here
    ?>
</body>
<?php
	}else{
    
    }
?>

