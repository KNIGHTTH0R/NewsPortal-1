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
        
        include_once './header.php';
        include_once './menu.php';
        include_once './connect.php';
        
        session_start();
        if(isset($_POST['username']))
            {
                $name=$_POST['username']; 
                $password=$_POST['password'];
                
            
        $result = mysqli_query($link,"SELECT * FROM administrator where adminid = '$name' AND password = '$password'");
        if(mysqli_num_rows($result) == 1){
            $_SESSION['name']=$name;
            $_SESSION['login_type']='administrator';
                header("location:./administrator.php");
        }
        else
        {
            
            header("Location:./login_administrator.php");
        }
        if(!$result)
                echo "Some error";
                mysqli_close($link);
                
        
            }
            //else
            //echo "<script>alert('invalid candidate');</script>";

        
        ?>
        <form action="login_administrator.php" method="post"> 
            

            <p>Username</p>
            <input type="text" name="username">
            <p>Password</p>
            <input type="password" name="password">
            <input type="submit">
        </form>

    </body>
</html>
