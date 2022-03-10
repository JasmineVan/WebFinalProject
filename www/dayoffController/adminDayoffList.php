<!-- admin side -->
<h3 class="text-center">Day Off List</h3>
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
            <th class="text-center">ID</th>
			<th class="text-center">EmployeeID</th>
			<th class="text-center">Quantity</th>
			<th class="text-center">Status</th>
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

	$sql = "SELECT * FROM dayoff WHERE EmployeeID IN(
        SELECT EmployeeID FROM employee WHERE LeaderFlag = '1'
    ) AND RequestStatus = '1'";

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
			$quantity = $row['Temp'];
			$status = $row['RequestStatus'];

            $latestDay = $row['DateRequest'];
			?>
			<tr>
                <td><?= $dayoffID ?></td>
				<td><?= $employeeID ?></td>
				<td><?= $quantity ?></td>
				<td><?= showStatus($status) ?></td>
                <td>
                    <button type='submit' class='btn btn-dark'>
                        <a href="../fileController/downReason.php?dayoffID=<?= $dayoffID ?>" class="text-white no-underline">Download</a>
                    </button>
                    <button type='submit' class='btn btn-success'>
                        <a href="../dayoffController/adminRequestApprove.php?dayoffID=<?= $dayoffID ?>" class="text-white no-underline">Approve</a>
                    </button>
                    <button type='submit' class='btn btn-danger'>
                        <a href="../dayoffController/adminRequestReject.php?dayoffID=<?= $dayoffID ?>" class="text-white no-underline">Reject</a>
                    </button>
                </td>
			</tr>
            <thead class="thead-light">
                <th colspan="5" class="text-center">Reason</th>
            </thead>
            <tr>
                <td colspan="5" class="text-center"><?= $reason?></td>
            </tr>
        <?php
		}
	}else{
        ?>
            <tr>
                <td colspan="5" class="text-center">No request</td>
            </tr>
        <?php
    }
?>
</table>


