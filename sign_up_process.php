<?php
    //echo $_POST['id'];
    // echo "
    // <script>
    // alert('비밀번호가 서로 일치하지 않습니다');
    // </script>
    // ";
    $conn = mysqli_connect("localhost", "root", "web", "db");

    $filtered = array(
        'id'=>mysqli_real_escape_string($conn, $_POST['id']),
        'email'=>mysqli_real_escape_string($conn, $_POST['email']),
        'password'=>mysqli_real_escape_string($conn, $_POST['password'])
    );
    if($filtered['id']==="root"){
        echo "<a href='index.php'>이 아이디론 만들지 못해용</a>";
        die();
    }
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $filtered['password'] = $hashedPassword;
    $sql = "INSERT INTO member (id, email, password,join_time) VALUES(
        '{$filtered['id']}',
        '{$filtered['email']}',
        '{$filtered['password']}',
        NOW()
        )
        ";
    // die($sql);
    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "<h1>ERROR!!!</h1>";
        error_log(mysqli_error($conn));
    }
    header('Location: /index.php?id='.$_POST['title']);
?>