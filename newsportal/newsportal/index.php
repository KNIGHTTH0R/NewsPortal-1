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
        
        include_once './connect.php';
        
        session_start();
        if(isset($_SESSION['user']))
        {
            if($_SESSION['login_type']=='reporter')
            {
                echo $_SESSION['login_type'];
                include_once './menu_logout.php';;
            }
            else
            {
                include_once './menu_adminlogout.php';
            }
                
        }
        else
            include_once './menu.php';
        
        ?>
        <center><h2>News about International and national</h2></center>
        <table border='1' width='100%'>
            <!--<tr><th>Reporter ID</th><th>News ID</th><th>Location</th><th>Headline</th><th>News</th><th>Date</th><th>Photo</th><th>Video</th><th>Verified</th></tr>--> 
            <?php
            
            function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
        $result= mysqli_query($link,"select * from international_national where verified='yes' order by date desc");
            while($row= mysqli_fetch_array($result,MYSQLI_NUM))
            {
               echo "<tr><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".limit_text($row[4],20)."<a href='readmore1.php?s=$row[1]'>Read More..</a></td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='300' height='300'/></td></tr>";
            }
            ?>
        </table>
	<table border='1' width='100%'>
            <center><h2>News about Sports and Entertainment</h2></center>
            <!--<tr><th>Reporter ID</th><th>News ID</th><th>Location</th><th>Headline</th><th>News</th><th>Date</th><th>Photo</th><th>Video</th><th>Verified</th></tr>--> 
            <?php
           
            $result= mysqli_query($link,"select * from sports_entertainment where verified='yes' order by date desc");
            while($row= mysqli_fetch_array($result,MYSQLI_NUM))
            {
              echo "<tr><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".limit_text($row[4],20)."<a href='readmore2.php?s=$row[1]'>Read More..</a></td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='300' height='300'/></td></tr>";
//               echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".$row[4]."</td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='50' height='75'/></td><td align='center'>".$row[7]."</td><td align='center'>".$row[8]."</td></tr>";
            }
            ?>
        </table>
        <table border='1' width='100%'>
            <!--<tr><th>Reporter ID</th><th>News ID</th><th>Location</th><th>Headline</th><th>News</th><th>Date</th><th>Photo</th><th>Video</th><th>Verified</th></tr>--> 
            <center><h2>News about Business and Technology</h2></center>
                <?php
           
            $result= mysqli_query($link,"select * from business_technology where verified='yes' order by date desc");
            while($row= mysqli_fetch_array($result,MYSQLI_NUM))
            {
                echo "<tr><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".limit_text($row[4],20)."<a href='readmore.php?s=$row[1]'>Read More..</a></td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='300' height='300'/></td></tr>";
//               echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".$row[4]."</td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='50' height='75'/></td><td align='center'>".$row[7]."</td><td align='center'>".$row[8]."</td></tr>";
            }
            ?>
        </table>	
  
        
        
        
        
    </body>
</html>
