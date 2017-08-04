<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            echo "bye bondhu";
            include_once './header.php';
            include_once './menu.php';
            session_start();
            if(isset($_SESSION['id']))
            {
            
        ?>
        <?php
                echo $_SESSION['id'].",has been logged out.";
                session_destroy();
            }
            else
            {
                header("Location:login_reporter.php");
            }
        ?>
    </body>
</html>
