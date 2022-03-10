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
	$sql = "SELECT AvatarPath FROM employee WHERE EmployeeID = '$currentUser'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
			$avatarPath = $row['AvatarPath'];

            echo '
            <div class="text-center mx-5 my-5">
            <img src=" '.$avatarPath.' " alt="Avatar" width="300" height="300" class="rounded-circle">
            </div>
            ';
		}
		require("../Requirement.php");
	}
?>