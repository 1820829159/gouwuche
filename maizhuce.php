<?php
session_start();
$username=$_SESSION['username'];
$name=$_POST['name'];
$tele=$_POST['tel'];
$shen=$_POST['shenfenzheng'];
$sex=$_POST['sex'];
if(empty($shen)||empty($tele)||empty($name)){
    echo '<script>alert("请完善信息");history.go(-1);</script>';
}
if(strlen($tele)!=12){
    echo '<script>alert("请输入12位的手机号码");history.go(-1);</script>';
}
if(strlen($shen)!=18){
    echo '<script>alert("请输入正确的身份证号码");history.go(-1);</script>';
}
$con=mysqli_connect("localhost",'root','root');
mysqli_query($con,'set names utf8');
mysqli_select_db($con,'y_user');
$sql="insert into m_users(id,name,tele,shen) values($username,$name,$tele.$shen)";
mysqli_query($con,$sql);
?>

