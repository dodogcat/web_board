<?php
    $connect = mysqli_connect("localhost","root","web", "db");
    $sql = "INSERT INTO iu VALUES ('MySQL','MySQL is ...', NOW())";
    $result = mysqli_query($connect, $sql);

    echo "ping test!\n";
    if (mysqli_ping($connect)) {
        printf ("Our connection is ok!\n");
    } else {
        echo "Error: ".mysqli_error($connect);
    }
    
    echo "connection test \n";
    if ( mysqli_connect_errno() )

    {
    
        echo "DB 연결에 실패했습니다 " .mysqli_connect_errno(). mysqli_connect_error();
    
    }
    

    if($result === false){
        echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
        error_log(mysqli_error($connect));
    } 
    else {
        echo '성공했습니다. <a href="index.php">돌아가기</a>';
    }
?>