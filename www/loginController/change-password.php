<?php require("../Requirement.php"); ?>
<!--nav-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="../index.php">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a  class="nav-link bg-danger rounded text-white" href="logout.php">Logout</a>
        </li>
    </ul>
</nav>

<!--no log in-->
<head>
    <title>Change Password</title>
</head>
<body>
    <!-- change password form -->
    <form class="d-flex justify-content-center p-5 w-auto h-auto" action="change-password-handle.php" method="POST">
        <table class="d-flex table-dark table-borderless rounded w-25 h-25 justify-content-center p-2">
            <tr>
                <td>
                    <label for="password">New password</label>
                </td>
                <td>
                    <input type="password" name="pass" id="password" placeholder="Enter your new password...">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success">Save</button>
                </td>
            </tr>
        </table>
    </form>	
</body>