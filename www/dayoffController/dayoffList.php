<!-- Leader side -->
<h3 class="text-center">Day Off List</h3>
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
            <th class="text-center">ID</th>
			<th class="text-center">EmployeeID</th>
			<th class="text-center">Reason</th>
			<th class="text-center">Available</th>
            <th class="text-center">Status</th>
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
	$sql = "SELECT * FROM dayoff WHERE EmployeeID = '$currentUser'";

	$result = $conn->query($sql);

    //funtion handle status 
    function showStatus(int $statusCode){
        $stt = "";
        if($statusCode < 1){
            $stt = "First create";
            return $stt;
        }elseif($statusCode == 1){
            $stt = "Waiting";
            return $stt;
        }elseif($statusCode == 2){
            $stt = "Approved";
            return $stt;
        }elseif($statusCode >= 3){
            $stt = "Rejected";
            return $stt;
        }else{
            $stt = "Exception";
            return $stt;
        }
    }

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
            $dayoffID = $row['DayOffID'];
            $employeeID = $row['EmployeeID'];
            $reason = $row['Reason'];
			$available = 15 - $row['NumberOfRequest'];
			$status = $row['RequestStatus'];

            $latestDay = $row['DateRequest'];
			?>
			<tr>
                <td><?= $dayoffID ?></td>
				<td><?= $employeeID ?></td>
				<td><?= $reason?></td>
				<td><?= $available ?></td>
				<td><?= showStatus($status) ?></td>
			</tr>
			<?php
		}
        require("../dayoffController/enableNewRequest.php");
	}
?>
</table>


