<?php
session_start();
$gname=$_SESSION['gname'];
$uname=$_POST['name'];
$unitprice=$_POST['unitprice'];
$unitcontent=$_POST['unitcontent'];
$pid=$_POST['pid'];
if($_FILES['file']["error"])
{
    echo $_FILES["file"]["error"];
}else{
    if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg"))
    {
        $filename ="./img/".time().$_FILES["file"]["name"];
        $filename =iconv("UTF-8","gb2312",$filename);
        if(file_exists($filename))
        {
            echo '<script>alert("该文件已存在");history.go(-1);</script>';
            exit(0);
        }
        else{
            move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
        }
    }
    else
    {
        echo '<script>alert("文件格式错误");history.go(-1);</script>';
        exit(0);

    }
}
if(empty($gname)||empty($uname)||empty($unitcontent)||empty($unitprice)||empty($pid)){
    echo '<script>alert("请完善商品信息");history.go(-1);</script>';
    exit(0);
}
include_once "hunluan.php";
$sql="insert into goods(uid,uname,unitprice,ucontent,pid,img) values('$gname','$uname','$unitprice','$pid','$unitcontent','$filename')";
$m->query($sql);
echo '<script>alert("添加成功");history.go(-1);</script>';
exit(0);
?>