<?php
    // echo $_POST['file_name'];
    // unlink('data/'.$_POST['file_name']);
    session_start();
    if(!isset($_SESSION['user'])){
        echo "<a href='index.php'>로그인을 하세욧</a>";
        die();
    }
    if(!($_SESSION['user'] === "root")){
        echo "<a href='index.php'>ONLY Admin can delete! 관리자에게 요청하세요</a>";
        die();
    }
    
    $conn = mysqli_connect("localhost", "root", "web", "db");
    $filtered = array(
        'before_id'=>mysqli_real_escape_string($conn, $_POST['before_id']),
    );
    $sql  = "DELETE FROM iu 
        WHERE id = '{$filtered['before_id']}'
    ";
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "<h1>ERROR!!!</h1>";
        error_log(mysqli_error($conn));
    }
    header('Location: /index.php');
?>