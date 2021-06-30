<?php
	function print_description(){
		// if(isset($_GET['id'])){
		// 	echo file_get_contents("data/".$_GET['id']);
		// } else {
		// 	echo "Hello, PHP";
		// }
		$conn = mysqli_connect("localhost", "root", "web", "db");
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "SELECT * FROM iu WHERE id={$id}";
		
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$escaped_desc = htmlspecialchars($row['description']);
		echo $escaped_desc;
	}
	function print_author(){
		// if(isset($_GET['id'])){
		// 	echo file_get_contents("data/".$_GET['id']);
		// } else {
		// 	echo "Hello, PHP";
		// }
		$conn = mysqli_connect("localhost", "root", "web", "db");
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "SELECT * FROM iu WHERE id={$id}";
		
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$escaped_desc = htmlspecialchars($row['author']);
		echo $escaped_desc;
	}
	function print_title(){
		// if(isset($_GET['id'])){
		// echo $_GET['id'];
		// } else {
		// echo "Welcome";
		// }
		$conn = mysqli_connect("localhost", "root", "web", "db");
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "SELECT * FROM iu WHERE id={$id}";
		
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$escaped_title = htmlspecialchars($row['title']);
		echo $escaped_title;
	}
	function print_list(){
	// $list = scandir('./data');
	// $i = 0;
	// 	while($i < count($list)){
	// 		if($list[$i] != '.') {
	// 			if($list[$i] != '..') {
	// 				echo "<li><a href=\"index.php?id=$list[$i]\">$list[$i]</a></li>\n";
	// 			}
	// 		}
	// 		$i = $i + 1;
	// 	}
	// }
		$conn = mysqli_connect("localhost", "root", "web", "db");
		$sql = "SELECT * FROM iu LIMIT 100";
		
		$result = mysqli_query($conn, $sql);
		if($result === false){
			echo "<h1>ERROR!!!</h1>";
			error_log(mysqli_error($conn));
		}
		while($row = mysqli_fetch_array($result)) {
			$escaped_title = htmlspecialchars($row['title']);
			echo "<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
		}
	}
?>