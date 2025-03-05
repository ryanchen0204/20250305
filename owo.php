<html>
<head>
</head>
<body>
<?php
     for($i=1;$i<=6;$i++) {
	     printf("\t<H%d>標題%d</h%d>\n",$i,$i,$i);
     }

?>
<form method="post" action="result.php">
    帳號:<input type="text" name="myid" placeholder="請輸入帳號"><br>
    密碼:<input type="password" name="mypw" placeholder="請輸入密碼"><br> 
    <input type="submit" value="登入">
    <input type="reset" value="重設/清除">

</form>
</body>
</html>

