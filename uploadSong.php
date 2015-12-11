<?php
	
	$conn = new mysqli('localhost', 'sesosac1_user', 'p@s$word', 'sesosac1_vaporwavo');
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	if (isset($_POST['action'])) {          
		if ($_POST['action']=="upload") {
			$artistName       = mysqli_real_escape_string($conn,$_POST['artistName']);
			$genre      = mysqli_real_escape_string($conn,$_POST['genre']);
			$description   = mysqli_real_escape_string($conn,$_POST['description']);
			$link       = mysqli_real_escape_string($conn,$_POST['link']);
			$sql = "INSERT INTO songsTb(artistName,genre,description, link) values('".$artistName."','".$genre."','".$description."','".$link."');";
			$message = "upload successful";
				//echo "<script type='text/javascript'>
//window.location = 'http://sesosa.com/vaporwavo/userHome.php';</script>";
    		
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

p {
	color: #F9F9F9;
}

#logo {
	padding: 20px; 
	padding-left:30px; 
	color: #F9F9F9;
}

a {
	text-decoration: none; 
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
	<a href="userHome.php"><h1 id="logo">vaporwavo</h1></a>
	<div id="tabs" style="width: 480px;">
		<ul>
			<li><a href="#tabs-1">upload song</a></li>
		</ul>                 
		
			<div id="tabs-2">
				<form action="" method="post">
					<p><input id="artistName" name="artistName" type="text" placeholder="Artist Name"></p>
					<p><input id="genre" name="genre" type="text" placeholder="Genre"></p>
					<p><input id="description" name="description" type="text" placeholder="Description"></p>
					<p><input id="link" name="link" type="text" placeholder="Link">
						<p>*please note: you must have an embedded link from soundcloud or another service including html tags in order for you to upload a playable song</p>
						<p>example: &lt;iframe width="100%" height="20" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/235746920&amp;color=ff5500&amp;inverse=false&amp;auto_play=false&amp;show_user=true"&gt;&lt;/iframe&gt;</p>
  					<input name="action" type="hidden" value="upload" /></blockquote></p>
  				<p><input type="submit" value="upload" /></p>
				</form>
				
				
	
			</div>
			<?php
		echo '<b>'.$message.'</b>';
	?> 
	</div>
</body>
