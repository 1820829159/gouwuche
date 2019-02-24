<?php
$ji=$_POST['jibie'];
$name=$_POST['fenming'];
if(empty($name)){
    echo '<script>alert("请输入新建类别名");history.go(-1);</script>';
    exit(0);
}
include_once "hunluan.php";
$sql="insert into category(pid,name) values('$ji','$name')";
$m->query($sql);
echo '<script>alert("添加成功");history.go(-1);</script>';
exit(0);
?>