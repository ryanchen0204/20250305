<html>
    <head>
        <title>會員登錄</title>
        <meta charset="UFT-8">
        <script>
<?php
    if(isset($_POST["acct"])) {
        $filename="member.csv";
        if(file_exists($filename)) {
            $all=file_get_contents($filename);
            $members=
        }
        if(strcmp($_POST["pass1"],$_POST["pass2"])) {
            printf("alert('密碼不一致');");
        } else {
            $filename="member.csv";
            $acct_exited=true;
            if(file_exists($filename)) {
                $fp=fopen($filename,"r");

                while(($member=fgetcsv($fp,1000))!==FALSE) {
                    if(0==strcmp($member[0],$_POST["acct"])) {
                        printf("alert('會員已存在');");
                        $newmember=false;
                        break;
                    }
                }
                fclose($fp);
            }
            if($newmember) {
                $fp=fopen($filename,"a");
                fputcsv($fp,[$_POST["acct"],$_POST["name"],
                    password_hash($_POST["pass1"],PASSWORD_DEFAULT)]);    
                fclose($fp);
                printf("localtion.href='login.php';");
            }
        }    
    }
?>
        </script>
    </head>
    <body>
        <Hi>註冊會員</Hi>
        <form method="post">
            <p>帳　　號 : <input type="text" name="acct"></p>
            <p>顯示名稱 : <input type="text" name="name"></p>
            <p>密　　碼 : <input type="password" name="pass1"></p>
            <p>確認密碼 : <input type="password" name="pass2"></p>
            <p><input type="submit"></p>
        </form>
    </body>    
</html>