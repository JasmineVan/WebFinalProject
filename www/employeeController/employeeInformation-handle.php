<h3 class="text-center">Personal Information</h3>
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
			<th class="text-center">ID</th>
			<th class="text-center">Name</th>
			<th class="text-center">DateOfBirth</th>
			<th class="text-center">Password</th>
			<th class="text-center">Email</th>
            <th class="text-center">Department</th>
			<th class="text-center">Role</th>
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

    $currentUser = $_SESSION['user'];
	$sql = "SELECT * FROM employee WHERE EmployeeID = '$currentUser'";
	$result = $conn->query($sql);

    //identify role
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

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			$employeeID = $row['EmployeeID'];
			$employeeName = $row['EmployeeName'];
            $dateOfBirth = $row['DateOfBirth'];
            $accoutnPassword = $row['AccountPassword'];
			$employeeEmail = $row['Email'];
            $employeeDepartment = $row['Department'];
			$role = $row['LeaderFlag'];
            $info = $row['Info'];

			?>
			<tr>
				<td><?= $employeeID ?></td>
				<td><?= $employeeName ?></td>
				<td><?= $dateOfBirth?></td>
				<td><?= $accoutnPassword?></td>
                <td><?= $employeeEmail ?></td>
				<td><?= $employeeDepartment?></td>
				<td><?= identifyRole($role)?></td>
				<td>
					<button type='submit' class='btn btn-info'>
						<a href="../employeeController/editEmployee.php?editID=<?= $employeeID ?>&oldPasswordToCompare=<?= $accoutnPassword ?>" class="text-white no-underline">Edit</a>
					</button>
				</td>
			</tr>
            <!-- descrition -->

            <!-- <tr>
                <td colspan="8" class="text-center"><?= $info?></td>
            </tr> -->
			<?php
		}
		require("../Requirement.php");
	}
	else {
		?>
        <tr>
            <td colspan="8" class="text-center">No information!</td>
        </tr>
        <?php
	}

?>
</table>

