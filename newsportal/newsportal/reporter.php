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
            
            if(isset($_SESSION['user'])){
                if(isset($_POST['location'])){
                    $type=$_POST['type'];
                    $location=$_POST['location']; 
                    $id=$_SESSION['id'];
                    $headline=$_POST['headline'];
                    $news=$_POST['news'];
                    $date=$_POST['date'];
                    $mail1=$_SESSION['mail'];
                    $photo=$_FILES['nphoto']['name'];
                    $photo5="./upload_news/$photo";
                    if(isset($_FILES['nphoto']))
                    {
                    if(is_uploaded_file($_FILES['nphoto']['tmp_name']))
                    {
                        $path="./upload_news/$mail1.jpg";
                        move_uploaded_file($_FILES['nphoto']['tmp_name'],"./upload_news/".$_FILES['nphoto']['name']);
                    }
                    }
                    $result = mysqli_query($link,"insert into $type (reporterid,location,headline,news,date,nphoto,verified) values('$id','$location','$headline','$news','$date','$photo5','no')");
                   header("Location:index.php");
                    if(!$result)
                        echo "Some error".$result;
                    mysqli_close($link);
                }
            }
            else
            {    
                header("Location:sessionexpiry.php");
            }
        ?>
        <form action="reporter.php" method="post" enctype="multipart/form-data"> 
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
            <table>
                <tr><td>location</td><td><input type="text" name="location" placeholder="Location of the news"></td></tr>
                <tr><td>headline</td><td><input type="text" name="headline" ></td></tr> 
            </table>
            <p>Report</p><textarea rows="20" cols="50" name="news" placeholder="Enter the news"></textarea>
            <br>
            Photo: <input type="file" name="nphoto" />
            <br>
            Date: <input type="date" name="date" />
            <input type="submit"  value="Save" name='Save'> 
        </form>
    </body>
</html>