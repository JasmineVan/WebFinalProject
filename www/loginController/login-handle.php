<?php
    session_start();
  
    //function open database
    function open_database(){
        $host = 'mysql-server'; 
        $user = 'root';
        $pass = 'root';
        $db = 'project';
        $conn = new mysqli($host, $user, $pass, $db);
        $conn->set_charset("utf8");
        if ($conn->connect_error) {
            die('Can not connect to database: ' . $conn->connect_error);
        }
        return $conn;
    }
    
    //login function
    function loginEmployee($userName, $passWord){
        $sql = "SELECT * FROM employee WHERE employeeID = ?";
        $conn = open_database();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $userName);
        if(!$stm->execute()){
            return null;
        }

        $result = $stm->get_result();
        $data = $result->fetch_assoc();

        /*  Will use later when use hashed password
        $hashed_password = $data['AccountPassword']; 
        !password_verify($passWord, $hashed_password)
        */
        if($passWord != $data['AccountPassword']){
            return null;
        }elseif($passWord != $userName && $passWord == $data['AccountPassword'] && $data['LeaderFlag'] == 1){
            $_SESSION['user'] = 'leader';
            $_SESSION['leaderID'] = $userName;
            $_SESSION['leaderPass'] = $passWord;
            header('location: ../leaderController/leaderDashboard.php');
            die();
        }elseif($passWord == $userName){
            $_SESSION['user'] = $userName;
            $_SESSION['employeePass'] = $passWord;
            header('location: ../loginController/change-password.php');
            die();
        }else return $data;
    }

    //user name and password
    $userName = $_POST['user'];
    $passWord = $_POST['pass'];
    
    //validate input
    if(!isset($_POST['user']) || !isset($_POST['pass'])){
        require("../Requirement.php");
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 1: Not set username or password.</h3>
        </div>
        <?php
        die();
    }
    if(empty($_POST['user']) || empty($_POST['pass'])){
        require("../Requirement.php");
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 2: Username or password is empty.</h3>
        </div>
        <?php
        die();
    }

    // authorization 
    if($userName == 'admin' && $passWord == '123456'){
        $_SESSION['user'] = 'admin';
        header('location: ../adminController/admin.php');
        die();
    }elseif($userName != 'admin'){
        $data = loginEmployee($userName, $passWord);
        if($data){
            $_SESSION['user'] = $userName;
            header('location: ../employeeController/employeeDashboard.php');
            exit();
        }else{
            require("../Requirement.php");
            ?>
            <div class="d-flex justify-content-center mt-5">
                <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 4: Employee account is not correct.</h3>
            </div>
            <?php
            die();
        }
    }else{
        require("../Requirement.php");
        ?>
        <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-danger d-flex justify-content-center w-50 p-50">Invalid 3: Account is not correct.</h3>
        </div>
        <?php
        die();
    }
?>

