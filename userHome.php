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
		
* {
	color: #F9F9F9;
}
		
#frame iframe {
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

#uploadButton {
	padding: 20px; 
	padding-left:30px; 
	color: #F9F9F9;
	text-decoration: none;
	float: right; 
	position: fixed;
    bottom: 80%;
    right: 2%;
}


#tab ul li {
	list-style: none; 
    display: inline;
    margin-left: 10px; 
}

#tab ul li a{
	text-align: center; 
	text-decoration: none; 
	color: #F9F9F9;
	font-size: 20px; 
}

div#songList {
	position: fixed;
    bottom: 0%;
    right: 60%;
    width: 400px;
    height: 400px; 
    background-color:#333333;
    padding: 10px; 
}



</style>
<div id="frame">
<iframe src="webgl_interactive_cubes.html"></iframe> 
</div>
</head>
<body>
	<div id="tab">
		<ul> 
			<li><h1 id="logo">vaporwavo</h1></li>
			<li><a href="uploadSong.php"><h1 id="uploadButton">upload</h1></a></li>
		</ul>
	</div>
	
	<div id="songList"> 
		<?php

	$conn = new mysqli('localhost', 'sesosac1_user', 'p@s$word', 'sesosac1_vaporwavo');
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT artistName, genre, description, link FROM songsTb";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "artist: " . $row["artistName"]. " - genre: " . $row["genre"]. " - description: " . $row["description"]. "<br>";
        echo $row["link"]; 
    }
} else {
    echo "0 results";
}
$conn->close();

?>
	</div>
</form>
</body>
