<?php
session_start();
if(!empty($_SESSION)){$username=$_SESSION['name'];}
?>
<?php
include_once 'Mysql.class.php';
include_once 'mysqsl.config.php';
$s=new shuju();
$config=$s->shu('y_user');
$m=new Mysql($config);
$sql='select * from category';
$parent=$m->selectAll($sql);
function getTree($array, $pid =0, $level = 0){
    static $list = [];
    foreach ($array as $key => $value){
        if ($value['pid'] == $pid){
            $value['level'] = $level;
            $list[] = $value;
            unset($array[$key]);
            getTree($array, $value['id'], $level+1);

        }
    }
    return $list;
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="zhuye.css" rel="stylesheet" type="text/css">
    <title>圆圆圆购物网</title>
</head>
<body><div id="zong">
<div class="leftd">
    <ul class="shape"><li>
            <?php
            if(empty($username)){echo'<a href="dengl.html" id="spe">亲，请登录</a>';}
            else{echo $username;}
            ?></li>
        <li>
            <?php
            if(empty($username)){echo'<a href="zhuce.html">免费注册</a> ';}
            else{echo '您好';}
            ?></li>
    </ul>
</div>
<div class="rightd">
    <ul class="shape">
        <li><a href="che.php">购物车</a></li>
        <li id="shangjia"><a href="maijia.php">卖家中心</a>
            <ul id="list"><li id="kaidian"><a href="maizhuce.html">免费开店</a></li><br><li>我的商品</li></ul>
        </li>
        <li><a href="zhuye.php">圆圆主页</a> </li>
    </ul>
</div></div>
    <div class="logo1"><img src="TIM图片20190131231409.png" width="250px" height="86px" class="logoo">
        <form class="btnf-search" action="zy-search.php"><input type="text" class="search" placeholder="请输入商品"><button class="btn-search">搜索</button></form>
    </div>
<div class="zhuti">
<div class="tree">
<?php
    $arr=getTree($parent);
    foreach ($arr as $k=>$value){
        if($value['level']==0){?>
            <div id="<?php echo $value['id']?>" onmouseover="xian(<?php echo $value['id']?>)" onmouseout="disappear(<?php echo $value['id']?>"><?php echo $value['name']?></div>
        <?php }}?>
    </div>
<div class="tree2">
    <?php
    $arr=getTree($parent);
    foreach ($arr as $k=>$value){
    if($value['level']==1){?>
    <div class="<?php echo $value['pid'] ?>"><a href="search.php?pid=<?php echo $value['name']?>"><?php echo $value['name']?></a></div>
    <?php }}?>
</div>
</div>
<script type="text/javascript">
    let shangjia=document.getElementById('shangjia');
    let list=document.getElementById('list');
    shangjia.onmouseover=function () {
        list.style.display='inline-block';
    }
    shangjia.onmouseout=function () {
        list.style.display='none';
    }
    let kaidian=document.getElementById('kaidian');
    kaidian.onmouseover=function () {
        list.style.background='#BBBBB'
    }
    function xian(num){
        let list=document.getElementById("tree2");
        let str=document.getElementsByTagName('div');
        for( let i=0;i<str.length;i++){
            if(str[i].className==num){
                str[i].style.display="block";
            }
        }
    }
    function disappear(num){
        let list=document.getElementById("tree2");
        let str=document.getElementsByTagName('div');
        for( let i=0;i<str.length;i++){
            if(str[i].className==num){
                str[i].style.display="none";
            }
        }
    }
</script>
</body>
</html>