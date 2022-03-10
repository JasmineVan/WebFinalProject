<!-- Leader side -->
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
            <th class="text-center">ID</th>
			<th class="text-center">Name</th>
			<th class="text-center">Department</th>
			<th class="text-center">Email</th>
			<th class="text-center">Method</th>
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

    $currentUser = $_SESSION['leaderID'];
    // echo $currentUser;
	$sql = "SELECT EmployeeID, EmployeeName, Department, Email FROM employee WHERE EmployeeID in(
        SELECT EmployeeID FROM employee WHERE Department = (
            SELECT Department FROM employee WHERE EmployeeID = '$currentUser'
        ) AND LeaderFlag = '0'
    )";

    $result = $conn->query($sql);
    
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
            $employeeID = $row['EmployeeID'];
            $employeeName = $row['EmployeeName'];
            $employeeDepartment = $row['Department'];
			$email = $row['Email'];

			?>
			<tr>
                <td><?= $employeeID ?></td>
				<td><?= $employeeName ?></td>
				<td><?= $employeeDepartment?></td>
				<td><?= $email?></td>
				<td>
                    <button type='submit' class='btn btn-success'>
                        <a href="../taskController/newTask2-handle.php?employeeID=<?= $employeeID ?>" class="text-white no-underline">Add Task</a>
                    </button>
				</td>
			</tr>
			<?php
		}
        
		require("../Requirement.php");
	}
	else {
		?>
        <tr>
            <td colspan="5" class="text-center">There are employee!</td>
        </tr>
        <?php
	}

?>
</table>

