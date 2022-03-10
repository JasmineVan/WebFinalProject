<?php 
session_start();
require("../Requirement.php");
if(isset($_SESSION['user'])){
    ?>
    <head>
    <title>No such file</title>
    </head>
    <div class="d-flex justify-content-center mt-5">
            <h3 class="alert alert-warning d-flex justify-content-center w-50 p-50">This task has 0 document.</h3>
    </div>
    <?php
}
?>