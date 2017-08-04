<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <script src="script/time.js"></script>
        <script src="jquery/jquery-3.2.1.min.js">
        </script>
        <script src="script/password.js" >
        </script>
        
        
        
        
    </head>
    <body>
        <text id="time_span"></text>
        <?php
            
            include_once './header.php';
            include_once './menu.php';
            include_once './connect.php';

            if(isset($_POST['fname']))
            {
                $fname=$_POST['fname']; 
                $lname=$_POST['lname'];
                $password=$_POST['password'];
                $email=$_POST['email'];
                $contact=$_POST['contact'];
                $varified="no";

                if(is_uploaded_file($_FILES['photo']['tmp_name']))
                {
                    $path="./upload/$email.jpg";
                    move_uploaded_file($_FILES['photo']['tmp_name'],$path);
                }
                
                
                
                $result=mysqli_query($link,"insert into reporter(fname,lname,password,email,contact,photo,varified) values('$fname','$lname','$password','$email','$contact','$path','$varified')");
                if(!$result)
                echo "Some error";
                mysqli_close($link);
                header("Location:index.php");
            }
            
        ?>
	<h3>Register</h3>

        <form action=""  method="post" id="form" enctype="multipart/form-data">
		<p>Name</p>
		<input type="text" name="fname" placeholder="Enter Your First Name" required="true">
		<input type="text" name="lname" placeholder="Enter Your Last Name" required="true">
                <br><br>
                <label>password :
                <input name="password" id="password" type="password" onkeyup='check();' />
                </label>
                <br><br>
                <label>confirm password:
                <input type="password" name="password2" id="confirm_password"  onkeyup='check();' /> 
                <span id='message'></span>
                </label>
                <p>Email</p>
		<input type="email" name="email" placeholder="Enter your email address" required="true">
		<p>Contact No</p>
		<input type="tel" name="contact" placeholder="Contac Number" required="true">
		<p>Upload Your picture</p>
		<input type="file" name="photo">
		<br>
		<input type="submit" name="submit" value="Register">
		
                
                
	</form>
        
    </body>
</html>
