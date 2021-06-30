<?php
    //echo $_POST['title'].$_POST['main'];
    //file_put_contents('data/'.$_POST['title'], $_POST['main']);
    session_start();
    if(!isset($_SESSION['user'])){
        echo "<a href='index.php'>로그인을 하세욧</a>";
        die();
    }
    $conn = mysqli_connect("localhost", "root", "web", "db");

    $filtered = array(
        'title'=>mysqli_real_escape_string($conn, $_POST['title']),
        'main'=>mysqli_real_escape_string($conn, $_POST['main'])
    );
    $sql = "INSERT INTO iu (title, description, author, created) VALUES(
        '{$filtered['title']}',
        '{$filtered['main']}',
        '{$_SESSION['user']}',
        NOW()
        )
        ";
    //die($sql);
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "<h1>ERROR!!!</h1>";
        error_log(mysqli_error($conn));
    }
    header('Location: /index.php?id='.$_POST['title']);
?>