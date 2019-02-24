<?php
$id=$_GET['id'];
include_once "hunluan.php";
$sql="delete from category where id='$id'";
$m->query($sql);
echo '<script>alert("删除成功");history.go(-1);</script>';
?>