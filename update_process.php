<?php
    // rename('data/'.$_POST['before_title'], 'data/'.$_POST['title']);
    // file_put_contents('data/'.$_POST['title'], $_POST['main']);
    // echo var_dump($_POST['before_title']);
    // echo "<h1>{$_POST['before_title']}</h1>";
    session_start();
    if(!isset($_SESSION['user'])){
        echo "<a href='index.php'>로그인을 하세욧</a>";
        die();
    }

    $conn = mysqli_connect("localhost", "root", "web", "db");
    $id = mysqli_real_escape_string($conn, $_GET['before_id']);
    $sql = "SELECT * FROM iu WHERE id={$id}";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $escaped_desc = htmlspecialchars($row['author']);

    if(!($_SESSION['user'] === "root" or $_SESSION['user'] === $escaped_desc)){
        echo "<a href='index.php'>Admin or Writter can change!</a>";
        echo "";
        die();
    }

    $conn = mysqli_connect("localhost", "root", "web", "db");
    $filtered = array(
        'title'=>mysqli_real_escape_string($conn, $_POST['title']),
        'main'=>mysqli_real_escape_string($conn, $_POST['main']),
        'before_id'=>mysqli_real_escape_string($conn, $_POST['before_id']),
    );
    $sql  = "UPDATE iu 
        SET title = '{$filtered['title']}', 
        description = '{$filtered['main']}',
        author = '{$_SESSION['user']}'  
        WHERE id = '{$filtered['before_id']}'
    ";
    echo "<h1>{$sql}</h1>";
    echo "\n";
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo mysqli_error($conn);
    }
    
   header('Location: /index.php?id='.$_POST['before_id']);
?>