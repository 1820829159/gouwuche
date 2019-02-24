<?php
session_start();
$username=$_SESSION['name'];
$id=$_GET['id'];
$count=$_POST['shuliang'];
include_once "hunluan.php";
$sql="select * from goods where id=$id";
$arr=$m->selectAll($sql);
$fff=$arr[0]['uid'];
$unitprice=$arr[0]['unitprice'];
$price=$count*$unitprice;
$name=$arr[0]['uname'];
$sql="insert into b_goods('username','name','count','unitprice','price','fff') values=($username,$name,$count,$unitprice,$price,$fff)";
$m->query($sql);
echo '<script>alert("添加成功");history.go(-1);</script>';
?>