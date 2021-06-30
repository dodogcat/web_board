<?php
	require_once('lib/prints.php');
	require_once('view/top.php');
?>
		<?php
			$id = $_GET['id'];
			$selected = false;
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
				echo "<h2>Here is ";
				print_title();
				echo "</h2>";
				print_description();
			}
		?>
		<form action="update_process.php" method="post">
			<input type="hidden" name="before_id" value=<?php echo $_GET['id'];?>>
			<input type="hidden" name="before_title" value="<?php print_title();?>">
			<input type="text title" name="title" placeholder="앨범 제목" value="<?php print_title();?>">
			<p><textarea name="main" id="mm" cols="30" rows="10" placeholder="앨범 내용"><?php print_description();?></textarea></p>
			<input type="submit" value="Change Now">
		</form>
	</body>
</html>