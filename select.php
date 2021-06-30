<?php
    $conn = mysqli_connect("localhost", "root", "web", "db");
    $sql = "SELECT * FROM iu LIMIT 100";
    
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "<h1>ERROR!!!</h1>";
        error_log(mysqli_error($conn));
    }
    while($row = mysqli_fetch_array($result)) {
        echo '<h2>'.$row['title'].'</h2>';
        echo $row['description'];
    }
?>