<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "leader"){
?>

<head>
<title>New Task</title>
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
    //show list of task and employee
    $employeeID = $_GET['employeeID'];
    ?>
    <!-- new task form -->
    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="../taskController/newTask2-handle2.php" method="POST">
        <table class="d-flex table-dark table-borderless rounded w-50 h-50 justify-content-center p-2">
            <tr>
                <td>
                    <label for="taskName">Task Name</label>
                </td>
                <td>
                    <input type="text" name="taskName" id="taskName" placeholder="Enter task name...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="taskDescription">Description</label>
                </td>
                <td>
                    <input type="text" name="taskDescription" id="taskDescription" placeholder="Enter description...">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dateSubmit">Deadline</label>
                </td>
                <td>
                    <input type="date" name="dateSubmit" id="dateSubmit" min="<?php echo date("Y-m-d"); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <!-- this is hiden value to identify employee id to add task -->
                    <input type='hidden' name='employeeID' value='<?=$employeeID ?>'/>
                </td>
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

