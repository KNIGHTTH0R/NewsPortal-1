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
        <table width="100%" border="1">
        <?php
        // put your code here
        include_once './connect.php';
        // put your code here
         $result= mysqli_query($link,"select * from sports_entertainment where verified='yes'");
            while($row= mysqli_fetch_array($result,MYSQLI_NUM))
            {
                echo "<tr><td align='center'>".$row[3]."</td><td>".$row[4]."</td><td align='center'><img src=".$row[6]." width='300' height='300'/></td></tr>";
//               echo "<tr><td align='center'>".$row[0]."</td><td align='center'>".$row[1]."</td><td align='center'>".$row[2]."</td><td align='center'>".$row[3]."</td><td align='center'>".$row[4]."</td><td align='center'>".$row[5]."</td><td align='center'><img src=".$row[6]." width='50' height='75'/></td><td align='center'>".$row[7]."</td><td align='center'>".$row[8]."</td></tr>";
            }
        ?>
            </table>
    </body>
</html>
