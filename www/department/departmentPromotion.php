<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){
?>

<head>
<title>Department Promote/Demote</title>
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
    $departmentName = $_GET['departmentName'];
    // echo $detailID;
    ?>
    
    <!-- <div class="m-2">

    </div> -->

    <h3 class="d-flex justify-content-center">Department Promote/Demote</h3>
    <table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
			<th class="text-center">ID</th>
			<th class="text-center">Name</th>
			<th class="text-center">Email</th>
			<th class="text-center">Role</th>
            <th class="text-center">Department</th>
            <th class="text-center">Method</th>
		</tr>
	</thead>
    <?php 
    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    //identify roll function
    function identifyRole(int $num){
        $role = "";
        if ($num == 0){
            $role = "Member";
            return $role;
        }else if($num == 1){
            $role = "Leader";
            return $role;
        }else{
            $role = "No role in this department";
            return $role;
        }
    }

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('Can not connect to database: ' . $conn->connect_error);
    }

	$sql = "SELECT * from employee WHERE Department = '$departmentName'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
            $employeeID = $row['EmployeeID'];
			$employeeName = $row['EmployeeName'];
            $employeeEmail = $row['Email'];
            $employeeRole = identifyRole($row['LeaderFlag']);
            $employeeDepartment = $row['Department'];
			?>
			<tr>
				<td><?= $employeeID ?></td>
				<td><?= $employeeName ?></td>
				<td><?= $employeeEmail?></td>
				<td><?= $employeeRole?></td>
                <td><?= $employeeDepartment?></td>
                <td>
                    <button type='submit' class='btn btn-success'>
						<a href="../department/departmentPromote.php?employeeID=<?= $employeeID ?>&departmentName=<?= $departmentName ?>" class="text-white no-underline"
                            onclick="return confirm('Are you sure to promote this employee?')">Promote</a>
					</button>
                    <button  type='submit' class='btn btn-danger'>
                        <a href="../department/departmentDemote.php?employeeID=<?= $employeeID ?>&departmentName=<?= $departmentName ?>" class="text-white no-underline"
                            onclick="return confirm('Are you sure to demote this employee?')">Demote</a>
                    </button>
                </td>
			</tr>
			<?php
		}
	}
	else {
		?>
        <tr>
            <td colspan="6" class="text-center">No employee in this department!</td>
        </tr>
        <?php
	}

?>
</table>
</body>
<?php
	}else{
    
    }
?>
<?php ?>
