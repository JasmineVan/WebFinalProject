<!-- employee side -->
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
			<th class="text-center">ID</th>
			<th class="text-center">Employee</th>
			<th class="text-center">Date Submit</th>
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

    $currentUser = $_SESSION['user'];
	$sql = "SELECT * FROM task WHERE EmployeeID = '$currentUser'";
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

    // function handle button depend on status - interpolation
    function showButton(int $statusCode, string $targetID){
        if($statusCode <= 1){
            newButton($targetID);
        }elseif($statusCode == 2){
            submitButton($targetID);
        }elseif($statusCode == 3){
        }elseif($statusCode == 4){
            restartButton($targetID);
        }elseif($statusCode == 5){
        }elseif($statusCode >= 6){
        }
    }

    //new - employee can start
    function newButton(string $targetID){
        echo ''?>
            <button type='submit' class='btn btn-success'>
                <a href="../taskController/startTask.php?editID=<?= $targetID ?>" class="text-white no-underline">Start</a>
            </button>
        <?php
    }

    //inprogress - employee can submit and upload file if need
    function submitButton(string $targetID){
        echo ''?>
            <button type='submit' class='btn btn-dark'>
                <a href="../fileController/downDocument.php?editID=<?= $targetID ?>" class="text-white no-underline">Download</a>
            </button>
            <button type='submit' class='btn btn-dark'>
                <a href="../fileController/upDocument.php?editID=<?= $targetID ?>" class="text-white no-underline">Upload</a>
            </button>
            <button type='submit' class='btn btn-success'>
                <a href="../taskController/submitTask.php?editID=<?= $targetID ?>" class="text-white no-underline">Submit</a>
            </button>
        <?php
    }

    //waiting

    //rejected - employee can restart
    function restartButton(string $targetID){
        echo ''?>
            <button type='submit' class='btn btn-warning'>
                <a href="../taskController/restartTask.php?editID=<?= $targetID ?>" class="text-white no-underline">Restart</a>
            </button>
        <?php
    }

    //canceled

    //completed


	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			$TaskID = $row['TaskID'];
            $employeeID = $row['EmployeeID'];
			$DateSubmit = $row['DateSubmit'];
			$TaskStatus = $row['TaskStatus'];

			?>
			<tr>
				<td><?= $TaskID ?></td>
				<td><?= $employeeID ?></td>
				<td><?= $DateSubmit?></td>
				<td><?= showStatus($TaskStatus)?></td>
				<td>
					<button type='submit' class='btn btn-info'>
						<a href="../taskController/detailTask.php?detailID=<?= $TaskID ?>" class="text-white no-underline">Detail</a>
					</button>
                    <!-- this is main button -->
                    <?php showButton($TaskStatus, $TaskID) ?>
				</td>
			</tr>
			<?php
		}
		require("../Requirement.php");
	}
	else {
		?>
        <tr>
            <td colspan="5" class="text-center">You have no task currently!</td>
        </tr>
        <?php
	}

?>
</table>

