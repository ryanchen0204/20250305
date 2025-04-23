<html>
<head>
    <title>管理頁面</title>
    <meta charset="UTF-8">
    <script>
<?php
    if(isset($_GET["act"])) {
        $db = new mysqli("localhost","root","","msgboard"); 
        switch($_GET["act"]) {
            case "del":
                $db->query("DELETE FROM account WHERE idno=".$_GET["id"]);
                break;
        case "chpw":
            $sql=sprintf("UPDATE account SET pass='%s' WHERE idno='%d'",password_hash($_GET["pw"],PASSWORD_DEFAULT),$_GET["id"]);     
            $db->query($sql);;
            break;

        }
        printf("location.href='mysql_login.php;");
    }
?>
    function del(id) {
        if(confirm("確定要刪除該帳號?資料不可回復!")) {
            location.href=`?act=del&id=${id}`;
        }
    }
    function chpw(id) {
        if(confirm("確定要修改新密碼嗎?")) {
            pw=prompt("請輸入新密碼:");
            location.href=`?act=chpw&id=${id}`;
        }
    }
    </script>
</head>
<body>
    <table border=1 cellspacing=0 cellpadding=5>
<?php
    $db = new mysqli("localhost","root","","msgboard");
    $res=$db->query("SELECT * FROM account");
    $all=$res->fetch_all(MYSQLI_ASSOC);

    printf("<tr><th>%s</th></tr>\n",join("</th><th>",["帳號","密碼","功能"]));
    foreach($all as $row) {
        $line=[$row["acct"],$row["name"],sprintf("<button onlick=\"del('%d');\">刪除</button> <button onlick=\"chpw('%d');\">修改密碼</button>",$row["idno"],$row["idno"])];
        printf("<tr><td>%s</td></tr>\n",join("</td><td>",$line));     
    }
?>
    </table>
</body>
</html>