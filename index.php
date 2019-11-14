<?php

   /*Variables to collect form values*/
    $username=$password="";

   $usernameerr=$passworderr="";
   if($_SERVER['REQUEST_METHOD']=="POST"){
      if (empty($_POST['username'])) {  
          $usernameerr = "email required";  
          $valid=false;  
          } 
      else{
	      $username=errorcheck($_POST['username']);
          }	  
       if (empty($_POST['password'])) {  
          $passworderr = "password required";  
          $valid=false;  
          } 
	  else
	{
	      $password=errorcheck($_POST['password']);
	}	  

     
}

/*Function to check and validate  the form entries*/
    function errorcheck($data){


	    $data=trim($data);
	    $data=htmlspecialchars($data);
	    $data=stripslashes($data);
        }
?>
<?php
       include 'data.php';  
      if(isset($_POST['post'])){
 

    
	$username=$_POST['username'];
	$password=$_POST['password'];
    $encrypt=password_hash($password, PASSWORD_BCRYPT);
	   $query = " INSERT INTO users(Username, Password)VALUES ('$username','$encrypt')";
	   
      mysqli_query($conn, $query);
      header("location:loginc.php");

      
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="Assets/css/style1.css">
    <style>
        .hi{
            background-color:coral;
        }
    </style>
    
</head>

<body>
   <div class="hi">
    <div id=demo>

        <center><form id=form1 action="" method="POST" >
               <div class="container">
             <div id="label"><label><h1>Registration Page</h1></label></div><br>
             <label><b>username:</b></label>
             <input class="p-md-5" type="text" name="username" placeholder="Enter username" required  autocomplete="off"><br><br>
             <div id="errloc"></div>
             <label><b>password:</b></label>
             <input class="p-md-5" type="password" name="password" placeholder="Password" required id="password"><br><br>
             <div id="errloc2"></div>
            
             <button class="btn btn-primary" type="submit"  value="Login" name="post" onclick="loginc.php">Register</button></div>
            </form>  </center>
    </div></div>
</body>
     