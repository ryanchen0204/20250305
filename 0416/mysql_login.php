<html>
    <head>
        <title>會員登入</title>
        <meta charset="UFT-8">
        <script>
<?php
    if(isset($_POST["acct"])) {
        $db = new mysqli("localhost","root","","msgboard");
        $sql=sprintf("SELECT * FROM account WHERE acct='%s'",$_POST["acct"]);
        $res=$db->query($sql);
        if($res->num_rows<=0) { 
            printf("alert('無會員資料，請通知管理員!');");
            } else {
                $row = $res->fetch_assoc();
                if(password_verify($_POST["pass"],$row["pass"])) {
                    printf("alert('歡迎登入，%s');",$row["name"]);
                    printf("location.href='mysql_reg.php';");
            }
        }
    }
?>
        </script>
    </head>
    <body>
        <Hi>會員登入</Hi>
        <form method="post">
            <p>帳　　號 : <input type="text" name="acct"></p>
            <p>密　　碼 : <input type="password" name="pass"></p>
            <p><input type="submit" value="登入"></p>
        </form>
    </body>    
</html>