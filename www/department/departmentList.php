
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
			<th class="text-center">ID</th>
			<th class="text-center">Name</th>
			<th class="text-center">Leader</th>
			<th class="text-center">Description</th>
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

	$sql = "SELECT DepartmentID, DepartmentName, DepartmentLeader, DepartmentDescription FROM department";
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
				<td>
					<button type='submit' class='btn btn-info'>
						<a href="../department/detailDepartment.php?detailID=<?= $departmentID ?>" class="text-white no-underline">Detail</a>
					</button>
					<button type='submit' class='btn btn-secondary'>
						<a href="../department/editDepartment.php?editID=<?= $departmentID ?>&oldName=<?= $departmentName ?>" class="text-white no-underline">Edit</a>
					</button>
					<button type='submit' class='btn btn-primary'>
						<a href="../department/departmentPromotion.php?departmentName=<?= $departmentName ?>" class="text-white no-underline">Promote/Demote</a>
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
            <td colspan="5" class="text-center">No department!</td>
        </tr>
        <?php
	}

?>
</table>

