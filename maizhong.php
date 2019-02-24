<?php
session_start();
$id=$_SESSION["name"];
$username=$_SESSION['name'];
if(empty($username)){
    header("location:dengl.html?ret='maijia.php'");
    exit;}
$con=mysqli_connect('localhost','root','root');
mysqli_query($con,'set names utf8');
mysqli_select_db($con,'y_user');
$sql="select * from m_users where name=$username";
$row=mysqli_query($con,$sql);
$num=mysqli_num_rows($row);
$ret='maizhuce.html';
if(empty($num)){
    header("location:".$ret);
}else {
    header("location".'maizhong.php');
}
?>
