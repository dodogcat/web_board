<?php
    file_put_contents('data/'.$_POST['title'], $_POST['main']);
    echo $_POST['title'];
?>