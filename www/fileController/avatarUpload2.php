<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user']) && $_SESSION['user'] == "leader"){
?>

<head>
<title>Upload Avatar</title>
</head>

<body>
    <!--nav-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="../leaderController/leaderInformation.php"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link disabled" href=""><i class="fas fa-chevron-right"></i></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="../leaderController/leaderDashboard.php">Task Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="../leaderController/leaderInformation.php">Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../leaderController/leaderDayoffRequest.php">Dayoff Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../leaderController/leaderDayoffManagement.php">Dayoff Management</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a  class="nav-link bg-danger rounded text-white" href="../loginController/logout.php">Logout</a>
            </li>
        </ul>
    </nav>

    <?php
    // get leader id
    $currentUser = $_POST['editID'];
    
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

    if(isset($_FILES['avatar'])){
        $file = $_FILES['avatar'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileTmp = $file['tmp_name'];
        
        //get file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        //which folder to store this new uploaded file
        $destination = '../uploads/' .$currentUser. '-' .$fileName;
        $status = move_uploaded_file($fileTmp, $destination);

        if($status == true){
            $sql = "UPDATE employee SET AvatarPath = '$destination' WHERE EmployeeID = '$currentUser' ";
            if (!$conn->query($sql)){
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not upload avatar.</h3>
                </div>
                <?php
                die('Can not upload avatar: ' . $conn->error);
            }else{
                ?>
                <div class="d-flex justify-content-center mt-5">
                    <h3 class="alert alert-success d-flex justify-content-center w-50">Avatar uploaded successfully.</h3>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="d-flex justify-content-center mt-5">
                <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Can not upload avatar.</h3>
            </div>
            <?php
        }
    }
    ?>

</body>

<?php
}
?>