<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
                <link rel="stylesheet" href="default.css" type="text/css" />
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

        $result = mysqli_query($link,"SELECT * FROM reporter where password = '$password' and email = '$name' ");
        if(mysqli_num_rows($result) == 1){
            
            
            while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){ 
                $id=$row['reporterid'];
                $mail=$row['email'];
            }
         
                $_SESSION['user']=$name;
                $_SESSION['id']=$id;
                $_SESSION['mail']=$mail;
                $_SESSION['login_type']="reporter";
                header("location:./reporter.php");
        }
        else
        {
            
            header("Location:./login_reporter.php");
        }
        if(!$result)
                echo "Some error";
                mysqli_close($link);
                
        
            }
                
        
        ?>
        <form action="login_reporter.php" method="post"> 
            
            <p>Username</p>
            <input type="text" name="username">
            <p>Password</p>
            <input type="password" name="password">
            <input type="submit">
        </form>

        
    </body>
</html>
