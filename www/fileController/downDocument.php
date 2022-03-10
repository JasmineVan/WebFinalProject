<?php
    $taskID = $_GET['editID'];
    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('Can not connect to database: ' . $conn->connect_error);
    }

	$sql = "SELECT FileFromLeader FROM task WHERE TaskID = '$taskID'";
	$result = $conn->query($sql);

    if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) 
		{
            $file = $row['FileFromLeader'];
            $fileName = substr($file, 12);
            $size = filesize($file);

            if(file_exists($file)){
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
            }else{
                header('location: ../fileController/noFile.php');
            }     
		}
	}
?>