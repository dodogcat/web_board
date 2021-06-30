<?php
$link = mysqli_connect("localhost", "root", "web", "db");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    printf("error code: %s\n", mysqli_connect_errno());
    exit();
}
$sql = "INSERT INTO iu (title,description,created) VALUES ('MySQL','MySQL is ...', NOW())";
//"SET a=1"
if (!mysqli_query($link, $sql)) {
    printf("Error message: %s\n", mysqli_error($link));
}

/* close connection */
mysqli_close($link);
?>