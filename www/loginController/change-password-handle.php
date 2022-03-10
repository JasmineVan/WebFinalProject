<?php
session_start();
if($_SESSION['user']){
    //database connection
    $host = 'mysql-server'; 
    $user = 'root';
    $pass = 'root';
    $db = 'project';

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error){
        die("Can not connect to database". $conn->connect_error);
    }

    // form variables
    $userName = $_SESSION['user'];
    $passWord = $_POST['pass'];

    //validate input
    if(!isset($_POST['pass'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 1: Not set username or password.</h3>
        </div>
        <?php
        die("Invalid 1: Not set username or password.");
    }

    if(empty($_POST['pass'])){
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 2: Please fill all information in this form.</h3>
        </div>
        <?php
        die("Invalid 2: Please fill all information in this form.");
    }

    //sql query
    $sql = "UPDATE employee SET AccountPassword = '$passWord' WHERE EmployeeID = '$userName' ";

    if (!$conn->query($sql)){
        die('Can not change password: ' . $conn->error);
    }else{
        header("location:../index.php");
    }

}else{
    
}
?>

<head>
<title>Change Password</title>
</head>