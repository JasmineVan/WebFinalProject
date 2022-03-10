<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
?>

<head>
<title>Employee Detail Information</title>
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

    <!-- handle here -->
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

	$sql = "SELECT * from employee WHERE employeeID = '$detailID'";
	$result = $conn->query($sql);

    // echo $detailID;
    ?>
    <h3 class="d-flex justify-content-center">Employee Detail Information</h3>
    <table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
			<th class="text-center">ID</th>
			<th class="text-center">Name</th class="text-center">
			<th class="text-center">Date Of Birth</th>
			<th class="text-center">Password</th>
			<th class="text-center">Email</th>
            <th class="text-center">Info</th>
			<th class="text-center">Department</th>
		</tr>
	</thead>
    <?php 

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			$employeeID = $row['EmployeeID'];
			$employeeName = $row['EmployeeName'];
            $employeeDateOfBirth = $row['DateOfBirth'];
            $employeeAccountPassword = $row['AccountPassword'];
            $employeeEmail = $row['Email'];
			$employeeInfo = $row['Info'];
			$employeeDepartment = $row['Department'];
            $avatarPath = $row['AvatarPath'];
			?>
			<tr>
				<td><?= $employeeID ?></td>
				<td><?= $employeeName ?></td>
				<td><?= $employeeDateOfBirth?></td>
				<td><?= $employeeAccountPassword?></td>
				<td><?= $employeeEmail?></td>
                <td><?= $employeeInfo?></td>
				<td><?= $employeeDepartment?></td>
			</tr>
			<?php
           
		}
        echo '
        <div class="text-center mx-5 my-5">
        <img src=" '.$avatarPath.' " alt="Avatar" width="300" height="300" class="rounded-circle">
        </div>
        ';
		require("../Requirement.php");
	}
	else {
		echo "Database is empty";
	}
?>
</table>
</body>
<?php
	}else{
    
    }
?>
<?php ?>
