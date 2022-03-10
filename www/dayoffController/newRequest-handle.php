<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] != "admin" && $_SESSION['user'] != "leader"){
    ?>

<head>
<title>Dayoff</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../employeeController/employeeInformation.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href=""><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../employeeController/employeeDashboard.php">Task Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../employeeController/employeeInformation.php">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../employeeController/employeeDayoffRequest.php">Dayoff Request</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a  class="nav-link bg-danger rounded text-white" href="../loginController/logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <!-- handle here -->
    <?php
    // get leader id
    $employeeID = $_SESSION['user'];
    $reason = $_POST['reason'];
    $quantity = $_POST['quantity'];
    $requestID = $_POST['requestID'];
    $thisDay = date("Y-n-j");

    //copnnect db
    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
        die('Can not connect to database: ' . $conn->connect_error);
    }

    if(!isset($_POST['reason']) || !isset($_POST['quantity'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 1: Information can not empty.</h3>
        </div>
        <?php
        die();
    }

    if(empty($_POST['reason']) || empty($_POST['quantity'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 2: Please fill all information in this form.</h3>
        </div>
        <?php
        die();
    }

    if(isset($_FILES['attach'])){
        $file = $_FILES['attach'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        
        //get file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        //which folder to store this new uploaded file
        $destination = '../uploads3/' .$employeeID. '-' .$fileName;
        $status = move_uploaded_file($fileTmp, $destination);

        if($status == true){
            $sql = "INSERT INTO dayoff(EmployeeID, DateRequest, Attachment, Temp, Reason, RequestStatus)  VALUES ('$employeeID', '$thisDay', '$destination', '$quantity', '$reason', '1')";
            if (!$conn->query($sql)){
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not upload document.</h3>
                </div>
                <?php
                die('Can not document: ' . $conn->error);
            }else{
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <h3 class="alert alert-success d-flex justify-content-center w-50">Dayoff request successfully.</h3>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="d-flex justify-content-center mt-5">
                <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not upload document.</h3>
            </div>
            <?php
        }
    }
    ?>
</body>

<?php
}
?>