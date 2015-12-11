
<?php
	
	$conn = new mysqli('localhost', 'sesosac1_user', 'p@s$word', 'sesosac1_vaporwavo');
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	session_start();
	if (isset($_POST['action'])) {          
		if ($_POST['action']=="login") {
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$password = mysqli_real_escape_string($conn,$_POST['password']);
			$sql = "SELECT name FROM usersTb WHERE email = '".$email."' AND password = '".md5($password)."';";
			
			if ($conn->query($sql) == TRUE) {
				$message = $Results['name']." Login Sucessfully!!";
				$_SESSION["email"] = $email;
				echo "<script type='text/javascript'>
window.location = 'http://sesosa.com/vaporwavo/userHome.php';</script>";
    		} else {
				$message = "invalid email or password";
    		}        
		} elseif ($_POST['action']=="signup") {
			$name       = mysqli_real_escape_string($conn,$_POST['name']);
			$email      = mysqli_real_escape_string($conn,$_POST['email']);
			$password   = mysqli_real_escape_string($conn,$_POST['password']);
			$artistName       = mysqli_real_escape_string($conn,$_POST['artistName']);
			$genre      = mysqli_real_escape_string($conn,$_POST['genre']);
			$description   = mysqli_real_escape_string($conn,$_POST['description']);
			$query = "SELECT email FROM usersTb where email='".$email."'";
			$result = mysqli_query($conn,$query);
			$numResults = mysqli_num_rows($result);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$message =  "invalid email address";
    		} elseif($numResults>=1) {
				$message = $email."email already exists";
    		} else {
				$sql = "INSERT INTO usersTb(name,email,artistName, genre, description, password) values('".$name."','".$email."','".$artistName."','".$genre."','".$description."','".md5($password)."');";
				$message = "sign up successful ";
				$_SESSION["email"] = $email;
				echo "<script type='text/javascript'>
window.location = 'http://sesosa.com/vaporwavo/userHome.php';</script>";
    		}
		}
	}
	
	if ($conn->query($sql) == TRUE) {
		echo ""; 
 	} else {
 	   echo "";
	}
	
?> 

<head> 
	<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<link rel="stylesheet" href="css/login.css">
	<script>
		$(function() {
		$( "#tabs" ).tabs();
		});
	</script>
	<style>
		
iframe {
    z-index : -9999;
    position: absolute;
    top : 0;
    left    : 0;
    width   : 100%;
    height  : 100%;
    margin  : 0;
    padding : 0;
}

#logo {
	padding: 20px; 
	padding-left:30px; 
	color: #F9F9F9;
}

#tabs ul {
    margin-left: 20%; 
}

#tabs ul li {
	list-style: none; 
    display: inline;
    margin-left: 10px; 
}

#tabs ul li a{
	text-align: center; 
	text-decoration: none; 
	color: #F9F9F9;
	font-size: 20px; 
}





</style>
<iframe src="webgl_interactive_cubes.html"></iframe> 
</head>
<body>
	<h1 id="logo">vaporwavo</h1>
	<div id="tabs" style="width: 480px;">
		<ul>
			<li><a href="#tabs-1">login</a></li>
			<li><a href="#tabs-2" class="active">signup</a></li>
		</ul>                 
		<div id="tabs-1">
			<form action="" method="post">
				<p><input id="email" name="email" type="text" placeholder="Email"></p>
				<p><input id="password" name="password" type="password" placeholder="Password">
					<input name="action" type="hidden" value="login" /></p>
				<p><input type="submit" value="Login" /></p>
				</form>
			</div>
			<div id="tabs-2">
				<form action="" method="post">
					<p><input id="name" name="name" type="text" placeholder="Name"></p>
					<p><input id="email" name="email" type="text" placeholder="Email"></p>
					<p><input id="artistName" name="artistName" type="text" placeholder="Artist Name"></p>
					<p><input id="genre" name="genre" type="text" placeholder="Genre"></p>
					<p><input id="description" name="description" type="text" placeholder="Description"></p>
					<p><input id="password" name="password" type="password" placeholder="Password">
  					<input name="action" type="hidden" value="signup" /></p>
  				<p><input type="submit" value="Signup" /></p>
				</form>
				
				
	
			</div>
			<?php
		echo '<b>'.$message.'</b>';
	?> 
	</div>
</body>
