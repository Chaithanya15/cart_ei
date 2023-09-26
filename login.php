<?php 
	include('dbconnect.php'); // Include the database connection script
	session_start();  // Start a PHP session
	session_start();

	if(isset($_POST['userLogin'])){   // Check if the 'userLogin' parameter is set in the POST request

		$email=mysqli_real_escape_string($conn,$_POST['email']);     // Get and sanitize the 'email' parameter from the POST request     

		$pwd=md5($_POST['pwd']); // Get the 'pwd' (password) parameter from the POST request and hash it using md5
		$sql="SELECT * FROM user_info WHERE email='$email' AND password='$pwd'";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query); // Get the number of rows returned by the query

		if($count==1){
				$row=mysqli_fetch_array($run_query);  // If exactly one row is returned, indicating a successful login
				$_SESSION['uid']=$row['user_id'];
				$_SESSION['uname']=$row['first_name'];
				echo "true";
		}
			
	}

 ?>
