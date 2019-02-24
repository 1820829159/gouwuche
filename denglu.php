<?php
session_start();
$ret='zhuye.php';
//$ret=$_GET['ret'];
header("Content-type: text/html; charset=utf-8");
$username=$_POST['username'];
$password=$_POST['password'];
if($username==null||$username==' '){
    echo '<script>alert("请输入用户名！");history.go(-1);</script>';
    exit(0);
}
if($password==null||$password==' '){
    echo '<script>alert("请输入密码！");history.go(-1);</script>';
    exit(0);
}
$con=mysqli_connect('localhost','root','root');
mysqli_query($con,'set names utf8');
mysqli_select_db($con,'y_user');
$result=mysqli_query($con,$sql = "select name,password from y_users where name='" . $_POST['username'] . "'and password='" . md5($_POST['password']) . "'");
$num=mysqli_num_rows($result);
if($num){
    $_SESSION['name']=$username;
    $sqi="select id from y_users where username='$username'";
    $id=mysqli_query($con,$sqi);
    /*foreach($id as $k=>$value){
        $ids=$value['id'];
    }
    $_SESSION['id']=$ids;*/
   header("location:" . $ret);
}else{
        echo '<script>alert("用户名或密码输入错误！");history.go(-1);</script>';
}