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
        
        include_once './connect.php';
        include_once './header.php';
        include_once './menu_logout.php';
        
        session_start();
        
        if(isset($_SESSION['name'])){
        if(isset($_POST['Verify1']))
            {
                $id1=$_POST['id1'];
                $type=$_POST['type'];
                $result = mysqli_query($link,"SELECT * FROM $type where newsid=$id1 ");
                if(mysqli_num_rows($result) == 1)
                {
                    mysqli_query($link,"update $type set verified='Yes' where newsid=$id1");  
                }
            }
            
            
             ?>  
        <a href="admin_news.php">News</a>
        <a href="administrator.php">Reporter</a>
        
        <form action='admin_news.php' method='post'>
            News ID:<input type="text" name="id1" placeholder="Enter Reporter ID"/>
            <input type="submit" value='Verify' name='Verify1'/>
            
            <form action="admin_news.php" method="post">
            <p>
                <label>
                <input type="radio" name="type" value="business_technology" id="business_technology">
                business_technology</label>
                <label>
                <input type="radio" name="type" value="sports_entertainment" id="sports_entertainment">
                sports_entertainment</label>
                <label>
                <input type="radio" name="type" value="international_national" id="international_national">
                international_national</label>
                <br>
            </p>
            </form>
            
            
            
        <table border='1' width='100%'>
            <tr><th>Reporter ID</th><th>News ID</th><th>Location</th><th>Headline</th><th>News</th><th>Date</th><th>Photo</th><th>Video</th><th>Verified</th></tr> 
            <?php
            echo "International and national";
            $result= mysqli_query($link,"select * from international_national");
            while($row= mysqli_fetch_array($result,MYSQLI_NUM))
            {
               echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".$row[4]."</td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='50' height='75'/></td><td align='center'>".$row[7]."</td><td align='center'>".$row[8]."</td></tr>";
            }
            ?>
        </table>
            <table border='1' width='100%'>
            <?php
            echo "Business and technology";
                       
            $result= mysqli_query($link,"select * from business_technology");
            while($row= mysqli_fetch_array($result,MYSQLI_NUM))
            {
               echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".$row[4]."</td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='50' height='75'/></td><td align='center'>".$row[7]."</td><td align='center'>".$row[8]."</td></tr>";
            }
            ?>
            </table>
            <table border='1' width='100%'>
            <?php
            echo "Sports and entertainment";
            $result= mysqli_query($link,"select * from sports_entertainment");
            while($row= mysqli_fetch_array($result,MYSQLI_NUM))
            {
               echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".$row[4]."</td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='50' height='75'/></td><td align='center'>".$row[7]."</td><td align='center'>".$row[8]."</td></tr>";
            }
            mysqli_close($link);
        }
        else
        {
            header("./sessionexpiry.php");
        }
            ?>
        </table>
        </form>
    </body>
</html>
