<?php
header("Content-type: text/html; charset=utf-8");
$username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
if($username==null||$username==' '){
    echo  '<script>alert("用户名不能为空");history.go(-1);</script>';
    exit(0);
}
if($password==null||$username==' '){
    echo  '<script>alert("密码不能为空");history.go(-1);</script>';
    exit(0);
}
if($repassword==null||$password==' '){
    echo  '<script>alert("请再次输入密码");history.go(-1);</script>';
    exit(0);
}if($password!=$repassword){
    echo '<script>alert("请输入一致的密码");history.go(-1);</script>';
}else {
    $con = mysqli_connect('localhost', 'root', 'root');
    mysqli_query($con, 'set names utf8');
    mysqli_select_db($con, 'y_user');
    $sql = "select name,password from y_users where username='" . $_POST['username'] . "'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num) {
        echo '<script>alert("用户名已经存在");history.go(-1);</script>';
    } else {
        $sql_insert="insert into y_users (name,password) values('".$_POST['username']."','".md5($_POST['password'])."')";
        mysqli_query($con,$sql_insert);
        echo $sql_insert;
        echo '<script>alert("注册成功");history.go(-1);</script>';
    }
}
