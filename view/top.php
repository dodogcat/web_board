<?php
	session_start();
    require_once('lib/prints.php');
?>

<!DOCTYPE html>
<html>
	<head></head>
	<body>
		<?php 
			echo "
			<form action='sign_up.php'>
				<button>회원가입</button>
			</form>
			";
			if(isset($_SESSION['user'])){
				echo "{$_SESSION['user']} 접속 중";
				echo "
				<form action='sign_out_process.php'>
					<button>로그아웃</button>
				</form>
				";
			}
			else{
				echo "
				<form action='sign_in.php'>
					<button>로그인</button>
				</form>
				";
			}
			echo "Server Time ";
			echo date("Y-m-d H:i:s");
		?>
		<?php
			echo "<h1>IU 5 16</h1>";
			echo "<a href=\"index.php\">";
			echo "<img src=\"https://w.namu.la/s/db95e8529db90e3ad7c75b6d7ea8506b7a4a6f0d547810cc6ab1aa8c7f063f848a56c4f93636c7fa53e81f5fe00a3374df82f3d4b38372669e466cad41c3ea9fa7099f7e8764f8dff1f0f0722a27313bbb307295e68263553a74429a94898083e2f4aa562481de38118ca4dfdca5f0c4\" width=30%/>";
			echo "</a>";
			#echo "<img src=\"https://w.namu.la/s/932bf176a4dfc68362f4470b53cfcc4dc77eeca3df8eb53fec826440a8c1936ad873b0b7701b7427390cd8fb1b75f6cff388bcf7d51e9b7f8d8084756ae272c93e9947783c692251b90dbdd4fb6f5d1cadb87b88d0d17748639f3e88864b66b09846345095c78edbc6edc17b4d0b1670\" />";
			#echo file_get_contents("data/".$_GET['id']);
		?>
		<ol>
				<?php
				print_list();
				?>	
		</ol>