<?php
session_start();
header("Content-type:text/html;charset=utf-8");    //设置编码
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
 mysqli_set_charset($conn,'utf8'); //设定字符集 
// 检测连接
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}



$name=$_POST['name'];

$pwd=$_POST['pwd'];

$yzm=$_POST['yzm'];

    if($name==''){
        echo "<script>alert('请输入用户名');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        exit;
    }
    if($pwd==''){

        echo "<script>alert('请输入密码');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
        exit;

    }

    if($yzm!=$_SESSION['VCODE']){

        echo"<script>alert('你的验证码不正确，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
        exit;

    }


    $sql = "select username,password from user where username = '$name' and password = '$pwd'";  
            $result = mysqli_query($conn,$sql);  
            $num = mysqli_num_rows($result);  
            if($num)  
            {  
                echo "<script>alert('chenxi,欢迎回来！'); window.location.href='blog/chenxi.html';</script>";  
            }  
            else  
            {  
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
            }
mysqli_close($conn);
?>