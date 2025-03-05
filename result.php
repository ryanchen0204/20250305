<?php 
//var_dump($_POST);/
    $hash=password_hash("aaa",PASSWORD_DEFAULT);

    if(($_POST["myid"]=="qqq")&&(password_verify($_POST["mypw"].$hash))) {
        echo "Login OK!";
    } else {
        echo "Login FALL!!";
    }
?>
