<!-- Leader side -->
<table class="table table-striped table-bordered table-hover">
	<thead class="thead-light">
		<tr>
            <th class="text-center">Name</th>
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

    $currentUser = $_SESSION['leaderID'];
	$sql = "SELECT * FROM task WHERE EmployeeID in(
        SELECT EmployeeID FROM employee WHERE Department = (
            SELECT Department FROM employee WHERE EmployeeID = '$currentUser'
        )
    )";

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
    function showButton(int $statusCode, string $targetID, string $extendFrom){
        if($statusCode <= 1){
            newButton($targetID);
        }elseif($statusCode == 2){
        }elseif($statusCode == 3){
            doneButton($targetID);
        }elseif($statusCode == 4){
            rejectButton($targetID, $extendFrom);
        }elseif($statusCode == 5){
        }elseif($statusCode >= 6){
        }
    }

    //new - leader can edit or cancel
    function newButton(string $targetID){
        echo ''?>
            <button type='submit' class='btn btn-dark'>
                <a href="../fileController/upDocument2.php?editID=<?= $targetID ?>" class="text-white no-underline">Upload</a>
            </button>
            <button type='submit' class='btn btn-secondary'>
                <a href="../taskController/editTask2.php?editID=<?= $targetID ?>" class="text-white no-underline">Edit</a>
            </button>
            <button type='submit' class='btn btn-danger'>
                <a href="../taskController/cancelTask2.php?cancelID=<?= $targetID ?>" class="text-white no-underline">Cancel</a>
            </button>
        <?php
    }

    //inprogress - leader can do nothing

    //cancel - leader can do nothing

    //waiting - leader can approve or reject
    function doneButton(string $targetID){
        echo ''?>
            <button type='submit' class='btn btn-dark'>
                <a href="../fileController/downDocument2.php?editID=<?= $targetID ?>" class="text-white no-underline">Download</a>
            </button>
            <button type='submit' class='btn btn-success'>
                <a href="../taskController/approveTask2.php?approveID=<?= $targetID ?>" class="text-white no-underline">Approve</a>
            </button>
            <button type='submit' class='btn btn-danger'>
                <a href="../taskController/rejectTask2.php?rejectID=<?= $targetID ?>" class="text-white no-underline">Reject</a>
            </button>
        <?php
    }

    //reject - leader can extend the deadline
    function rejectButton(string $targetID, string $extendFrom){
        echo ''?>
            <button type='submit' class='btn btn-warning'>
                <a href="../taskController/extendTask2.php?extendID=<?= $targetID ?>&extendFrom=<?= $extendFrom?>" class="text-white no-underline">Extend</a>
            </button>
        <?php
    }

    //conplete - leader can rate

    //show rate button 
    function showRateButton(string $statusCode, string $targetID, int $subDay){
        if($statusCode == 5){
            if($subDay >= 0){
                echo ''?>
                <button type='submit' class='btn btn-danger'>
                    <a href="../taskController/badTask.php?editID=<?= $targetID ?>" class="text-white no-underline">Bad</a>
                </button>
                <button type='submit' class='btn btn-warning'>
                    <a href="../taskController/OkTask.php?editID=<?= $targetID ?>" class="text-white no-underline">OK</a>
                </button>
                <button type='submit' class='btn btn-success'>
                    <a href="../taskController/GoodTask.php?editID=<?= $targetID ?>" class="text-white no-underline">Good</a>
                </button>
                <?php
            }else{
                echo ''?>
                <button type='submit' class='btn btn-danger'>
                    <a href="../taskController/badTask.php?editID=<?= $targetID ?>" class="text-white no-underline">Bad</a>
                </button>
                <button type='submit' class='btn btn-warning'>
                    <a href="../taskController/OkTask.php?editID=<?= $targetID ?>" class="text-white no-underline">OK</a>
                </button>
                <?php
            }
        }
    }

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
            $TaskID = $row['TaskID'];
            $TaskName = $row['TaskName'];
            $employeeID = $row['EmployeeID'];
			$DateSubmit = $row['DateSubmit'];
			$TaskStatus = $row['TaskStatus'];

            $day1 = strtotime($row['DateSubmit']);
            $day2 = strtotime($row['DateEmployeeSubmit']);
            $subDay = ($day1 - $day2)/86400;
            $style = "text-success";

			?>
			<tr>
                <td><?= $TaskName ?></td>
				<td><?= $employeeID ?></td>
				<td><?= $DateSubmit?></td>
				<td><?= showStatus($TaskStatus)?></td>
				<td>
                    <button type='submit' class='btn btn-info'>
                        <a href="../taskController/detailTask2.php?detailID=<?= $TaskID ?>" class="text-white no-underline">Detail</a>
                    </button>
                    <?php showButton($TaskStatus, $TaskID, $DateSubmit) ?>
                    <!-- this is rate feature button -->
                    <?php showRateButton($TaskStatus, $TaskID, $subDay) ?>
				</td>
			</tr>
			<?php
		}
        
		require("../Requirement.php");
	}
	else {
		?>
        <tr>
            <td colspan="6" class="text-center">There are no task for employee!</td>
        </tr>
        <?php
	}

?>
</table>

