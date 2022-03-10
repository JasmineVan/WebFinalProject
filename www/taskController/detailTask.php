<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] != "admin" && $_SESSION['user'] != "leader"){
?>

<head>
<title>Task Detail Information</title>
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

<!-- employee side -->
<h3 class="d-flex justify-content-center">Task Detail Information</h3>
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
			<th class="text-center">ID</th>
            <th class="text-center">Name</th>
			<th class="text-center">Employee</th>
            <th class="text-center">Date Publish</th>
			<th class="text-center">Date Submit</th>
			<th class="text-center">Status</th>
		</tr>
	</thead>
<?php 
    $detailID = $_GET['detailID'];

    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('Can not connect to database: ' . $conn->connect_error);
    }

	$sql = "SELECT TaskID, TaskName, EmployeeID, DatePublish, DateSubmit, TaskDescription, TaskStatus FROM task WHERE TaskID = '$detailID'";
	$result = $conn->query($sql);

    //funtion handle status 
    function showStatus(int $statusCode){
        $stt = "";
        if($statusCode <= 1){
            $stt = "New";
            return $stt;
        }elseif($statusCode == 2){
            $stt = "In Progress";
            return $stt;
        }elseif($statusCode == 3){
            $stt = "Waiting";
            return $stt;
        }elseif($statusCode == 4){
            $stt = "Rejected";
            return $stt;
        }elseif($statusCode == 5){
            $stt = "Completed";
            return $stt;
        }elseif($statusCode == 6){
            $stt = "Canceled";
            return $stt;
        }elseif($statusCode == 7){
            $stt = "Completed - Good";
            return $stt;
        }elseif($statusCode == 8){
            $stt = "Completed - OK";
            return $stt;
        }elseif($statusCode == 9){
            $stt = "Completed - Bad";
            return $stt;
        }else{
            $stt = "Exception";
            return $stt;
        }
    }
    
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			$TaskID = $row['TaskID'];
            $taskName = $row['TaskName'];
            $employeeID = $row['EmployeeID'];
            $DatePublish = $row['DatePublish'];
			$DateSubmit = $row['DateSubmit'];
            $TaskDescription = $row['TaskDescription'];
			$TaskStatus = $row['TaskStatus'];

			?>
			<tr>
				<td><?= $TaskID ?></td>
				<td><?= $taskName ?></td>
                <td><?= $employeeID ?></td>
                <td><?= $DatePublish?></td>
				<td><?= $DateSubmit?></td>
				<td><?= showStatus($TaskStatus)?></td>
			</tr>
            <thead class="thead-light">
                <tr>
                    <th class="text-center" colspan="6">Description</th>
                </tr>
            </thead>
            <tr>
                <td class="text-center" colspan="6"><?= $TaskDescription?></td>
            </tr>
			<?php
		}
		require("../Requirement.php");
	}
	else {
		?>
        <tr>
            <td colspan="6" class="text-center">You have no task currently!</td>
        </tr>
        <?php
	}

?>
</table>
<?php

}else{

}
?>


