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
        include_once './menu_logout.php';
        include_once './connect.php';
        
        session_start();
        ?>
        <a href="admin_news.php">News</a>
        <a href="administrator.php">Reporter</a>
        
        <form action='administrator.php' method='post'>
            ReporterID:<input type="text" name="id" placeholder="Enter Reporter ID"/>
            <input type="submit" value='Verify' name='Verify'/>
            <?php
            if(isset($_SESSION['name'])){
                
            if(isset($_POST['Verify']))
            {
                $id=$_POST['id'];
                $result = mysqli_query($link,"SELECT * FROM reporter where reporterid=$id ");
                if(mysqli_num_rows($result) == 1)
                {
                    mysqli_query($link,"update reporter set varified='Yes' where reporterid=$id");  
                }
            }
             ?>   
        <table border='1' width='100%'>
            <tr><th>Reporter ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Contact</th><th>Photo</th><th>Verified</th></tr> 
            <?php
            $result= mysqli_query($link,"select * from reporter");
            while($row= mysqli_fetch_array($result,MYSQLI_NUM))
            {
                
               echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$row[4]."</td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='50' height='75'/></td><td align='center'>".$row[7]."</td></tr>";
            }
            mysqli_close($link);
            }
            
            else {
                header("Location:sessionexpiry.php");
            }
                        ?>
         </table>
            </form>
    </body>
</html>
