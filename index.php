<?php
	require_once('lib/prints.php');
	require_once('view/top.php');
?>

		<?php
			$conn = mysqli_connect("localhost", "root", "web", "db");
			$id = mysqli_real_escape_string($conn, $_GET['id']);
			$selected = false;
			// echo $id;
			// echo $_GET['id'];
			if($id == ""){
				$i = 0;
				echo "<p>";
				while($i < 50){
					$i =  $i + 1;
					echo "아나바다";
					if($i % 7 == 0){
						echo "</p>";
						echo "<p>";
					}		
				}
				echo "<h2>No selection!!!</h2>";
			}
			else{
				$selected = true;
				echo "<p><h2>";
				print_title();
				echo "</h2>";
				echo "<h3>Written By ";
				print_author();
				echo "</h3></p>";
				print_description();
			}
		?>
		<p>
			<a href="create.php">create</a>
			<?php
				// echo "id check!!!";
				// echo $_GET['id'];
				if($selected){
					echo "<a href=\"update.php?id={$id}\">update</a>";
			?>
			<!--링크로 하면 그냥 날아갈수 있음-->
				<form action="delete_process.php" method="post">
					<input type="hidden" name="before_id" value=<?php echo $_GET['id'];?>>	
					<input type="hidden" name="file_name" 
						value=<?php echo $id; ?>
					>
					<input type="submit" value="delete">
				</form>			
			<?php
				}
			?>
		</p>
	</body>
</html>