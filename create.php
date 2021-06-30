<?php
	require_once('lib/prints.php');
	require_once('view/top.php');
?>
	<p><h2>앨범을 추가해 주세용</h3></p>
	<form action="create_process.php" method="post">
		<input type="text title" name="title" placeholder="앨범 제목">
		<p><textarea name="main" id="mm" cols="30" rows="10" placeholder="앨범 내용"></textarea></p>
		<input type="submit" value="add album">
	</form>
	</body>
</html>