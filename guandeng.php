<?php
session_start();
$ret='shiyan.php';
header("Content-type: text/html; charset=utf-8");
$username=$_POST['username1'];
$password=$_POST['password1'];
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
$result=mysqli_query($con,$sql = "select * from gusers where gname='" . $_POST['username1'] . "' and gpassword='" . md5($_POST['password1']) . "'");
$num=mysqli_num_rows($result);
if($num){
    $_SESSION['gname']=$username;
    /*foreach($id as $k=>$value){
        $ids=$value['id'];
    }
    $_SESSION['id']=$ids;*/
    header("location:" . $ret);
}else{
    echo '<script>alert("用户名或密码输入错误！");history.go(-1);</script>';
}
?>