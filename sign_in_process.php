<?php
    $conn = mysqli_connect("localhost", "root", "web", "db");

    $filtered = array(
        'id'=>mysqli_real_escape_string($conn, $_POST['id']),
        'password'=>mysqli_real_escape_string($conn, $_POST['password'])
    );
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // $filtered['password'] = $hashedPassword;
    $sql = "SELECT password FROM member 
    WHERE id = '{$filtered['id']}'";
    // die($sql);
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "<h1>ERROR!!!</h1>";
        error_log(mysqli_error($conn));
    }
    echo $sql;
    // session_start();
    // $_SESSION['user'] = "non";
    while($row = mysqli_fetch_array($result)) {
        $db_pw = $row['password'];
        echo $db_pw;
        if(password_verify($filtered['password'], $db_pw)){
            session_start();
            $_SESSION['user'] = $filtered['id'];
            echo "
                <script>
                alert('{$_SESSION['user']} 환영합니다.');
                </script>
                ";
            // sleep(1);    
            header('Location: /index.php');
        }
    }
    echo "
        <script>
        alert('실패!');
        </script>
        ";
    // sleep(1);
    header('Location: /index.php');
?>