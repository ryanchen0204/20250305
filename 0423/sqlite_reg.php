<html>
    <head>
        <title>註冊會員</title>
        <meta charset="UFT-8">
        <script>
<?php
        if(isset($_POST["acct"])) {
            if(strcmp($_POST["pass1"],$_POST["pass2"])){
                print("alert('密碼不一致');");
            } else {
                $db_name="msgboard.db3";
                if(file_exists($db_name)) {
                    $db = new SQLite3($db_name);
                } else {
                    $db = new SQLite3($db_name);
                    $sql="CREATE TABLE account ( \
                        idno INTEGER PRIMARY KEY AUTOINCREMENT, \
                        acct varchar(32) NOT NULL, \
                        name varchar(64) not null, \
                        pass varchar(256) not null \
                    )";
                    $db->query($sql);
                }
                $db = new SQLite3("localhost","root","","msgboard");
                $sql=sprintf("SELECT * FROM account WHERE acct='%s'",$_POST["acct"]);
                $res=$db->query($sql);
                if($res->numColumns() > 0) { 
                    printf("alert('會員已存在');");
                } else {
                    $sql=sprintf("INSERT INTO account (acct,name,pass) VALUES ('%s','%s','%s')",
                        $_POST["acct"],$_POST["name"],password_hash($_POST["pass1"],PASSWORD_DEFAULT));
                    $db->query($sql);
                    printf("location.href='mysql_login.php';");
            }
        }        
    }            
?>

        </script>
    </head>
    <body>
        <Hi>註冊會員</Hi>
        <form method="post">
            <p>帳　　號 : <input type="text" name="acct" placeholder="登入用的帳號"></p>
            <p>顯示名稱 : <input type="text" name="name" placeholder="登入後的顯示名稱"></p>
            <p>密　　碼 : <input type="password" name="pass1" placeholder="登入用的密碼"></p>
            <p>確認密碼 : <input type="password" name="pass2" placeholder="確認兩次密碼相同"></p>
            <p><input type="submit" value="我要註冊"></p>
        </form>
    </body>    
</html>