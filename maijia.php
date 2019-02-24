<?php
session_start();
$username=$_SESSION['name'];
if(empty($username)){
header("location:dengl.html?ret='maijia.php'");
exit;}
$con=mysqli_connect('localhost','root','root');
mysqli_query($con,'set names utf8');
mysqli_select_db($con,'y_user');
$sql="select * from m_users where id='$username'";
$row=mysqli_query($con,$sql);
$num=mysqli_num_rows($row);
$ret='maizhuce.html';
if(empty($num)){
    header("location:".$ret);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的店铺</title>
    <link href="zhuye.css" rel="stylesheet" type="text/css">
</head>
<body>
<div>
    <table>
        <thead>
        <tr>
            <th>我的商品</th>
            <th>商品描述</th>
            <th>单价</th>
        </tr>
        </thead>
    </table>
    <tbody class="shangpin">
    </tbody>
</div>
</body>
</html>
