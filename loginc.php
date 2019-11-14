<?php
         
       session_start();
      
        include 'data.php';

    if(isset($_POST['post'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
    $encrypt=password_hash($password, PASSWORD_BCRYPT);
       $query = "SELECT * FROM users WHERE Username='$username'";
       
    $result=  mysqli_query($conn, $query); 
        while($row=mysqli_fetch_array($result)){
         $userid=$row['User_ID'];
        $_SESSION['Username'] = $_POST['username'];
         
        header("location:src/calender.php?User_ID=".$userid);
        }
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" type="text/css" href="Assets/css/sample.css">
    <style type="text/css">
    body
      {
         
          background-size:cover;
          background-attachment: fixed;
            background-repeat: no-repeat;
      }
      #form
      {
    background-color:bisque;
          min-height: 700px;
          padding: 5px 40px 40px 40px;
      }
      .registration
      {
          font-size:55px;
          font-family: Agency FB;
          font-weight: 700;
          border-bottom-style: ridge;
      }
      .text
      {
          height: 43px;
      }
      label
      {
          font-size: 18px;
      }
      .btn-primary
      {
          border-radius: 0px;
          padding: 10px;
          width:48%;
              
      }
     .btn-danger
      {
          border-radius: 0px;
          padding: 10px;
          width:48%;
              
      }
        </style>
    
</head>

<body>
<div class="container" id=demo >
            <div class="row">
                <div class="col-md-6 col-md-offset-3" id="form" >
                   <center><b class="registration">Login Page</b></center>
                  <center> <form  id=form1 method="post" action="" style="background-color:lightblue;">
                       <br>
                        <div class="form-group">
                           <br>
                            <label><b>User Name:</b></label><br>
                            <input type="text" name="username"  class="form-control text" 
                            id="name" placeholder="Enter User Name" autocomplete="off">
                            <span id="unid" class="text-danger font-weight-bolt"></span>
                        </div><div id="errloc"></div>
                        
                         
                        <br><br>
                         <div class="form-group">
                            <label><b>Password:</b></label><br>
                            <input type="password" name="password"  class="form-control text" 
                            id="password" placeholder="Enter Password"  autocomplete="off">
                            <span id="spass" class="text-danger font-weight-bolt"></span>
                            <div id="errloc"></div>
                        </div>
                        <label id="rem">
              <br>   <input type="checkbox"  checked="checked">Remember Me
             </label><br>
             <button type="submit"  value="Login" name="post" >Register</button> <br><br> Not a Register yet?<a href="index.php">Register Now</a><br>
             
                        
                        
                    </form>
                    </center></div>
    </div>
    </div>
    </body>
</html>