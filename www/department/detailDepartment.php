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
    <?php
    $detailID = $_GET['detailID'];
    // echo $detailID;
    ?>

    <h3 class="d-flex justify-content-center">Department Detail Information</h3>
    <table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
			<th class="text-center">ID</th>
			<th class="text-center">Name</th>
			<th class="text-center">Leader</th>
			<th class="text-center">Description</th>
		</tr>
	</thead>
    <?php 
    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('Can not connect to database: ' . $conn->connect_error);
    }

	$sql = "SELECT * from department WHERE departmentID = '$detailID'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
            $departmentID = $row['DepartmentID'];
			$departmentName = $row['DepartmentName'];
            $departmentLeader = $row['DepartmentLeader'];
            $departmentDescription = $row['DepartmentDescription'];
			?>
			<tr>
				<td><?= $departmentID ?></td>
				<td><?= $departmentName ?></td>
				<td><?= $departmentLeader?></td>
				<td><?= $departmentDescription?></td>
			</tr>
			<?php
		}
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
