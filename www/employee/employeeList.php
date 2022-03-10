
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

	$sql = "SELECT EmployeeID, EmployeeName, Department, Email from employee";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			$employeeID = $row['EmployeeID'];
			$employeeName = $row['EmployeeName'];
			$employeeDepartment = $row['Department'];
			$employeeEmail = $row['Email'];
			?>
			<tr>
				<td><?= $employeeID ?></td>
				<td><?= $employeeName ?></td>
				<td><?= $employeeDepartment?></td>
				<td><?= $employeeEmail?></td>
				<td>
					<button type='submit' class='btn btn-info'>
						<a href="../employee/detailEmployee.php?detailID=<?= $employeeID ?>" class="text-white no-underline">Detail</a>
					</button>
					<button type='submit' class='btn btn-warning'>
						<a href="../employee/resetEmployee.php?resetID=<?= $employeeID ?>" class="text-white no-underline" onclick="return confirm('Are you sure to reset this employee password to default?')">Reset</a>
					</button>
					<button type='submit' class='btn btn-danger'>
						<a href="../employee/deleteEmployee.php?deleteID=<?= $employeeID ?>" class="text-white no-underline" onclick="return confirm('Are you sure to delete this employee?')">Delete</a>
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
            <td colspan="5" class="text-center">No employee!</td>
        </tr>
        <?php
	}

?>
</table>

