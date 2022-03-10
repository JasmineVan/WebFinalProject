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
	$sql = "SELECT * from dayoff where DayOffID in (SELECT MAX(DayOffID) FROM dayoff WHERE EmployeeID = '$currentUser')";

	$result = $conn->query($sql);

    //function to make sure 7 day after request employee can send another request
    function countDay(String $latestRequest, String $dayoffID){
        $thatDay = strtotime($latestRequest);
        $thisDay = strtotime(date("Y-n-j"));
        $subDay = ($thisDay - $thatDay)/86400;
        if($subDay >= 7){
            echo ''?>
            <button type="submit" class="btn btn-success">
                <a href="../dayoffController/newRequest2.php?requestID=<?= $dayoffID ?>" class="text-white no-underline">New Request</a>
            </button>
        <?php
        }else{
            echo ''?>
            <button type="submit" class="btn btn-success disabled" onClick="return false">
                <a href="" class="text-white no-underline">New Request</a>
            </button>
        <?php
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
                <td colspan="5" class="text-center">
                    <?php countDay($latestDay, $dayoffID) ?>
                </td>
            </tr>
			<?php
		}
	}
?>

