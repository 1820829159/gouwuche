<?php
session_start();
$username=$_SESSION['name'];
$id=$_GET['id'];
include_once "hunluan.php";
$sql="select * from goods where id='$id'";
$arr=$m->selectAll($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $arr[0]['uname']?></title>
    <link href="zhuye.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="zong">
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

<div class="shangsh">
    <div class="tupian"><img src="<?php echo $arr[0]['img']?>" style="width: 300px;height: 300px" class="tutu"></div>
    <div class="juti">
        <div><p style="font-size: 25px"><?php echo $arr[0]['ucontent']?></p></div>
        <form class="price" action="jiaru.php?id=<?php echo$arr[0]['id']?>" method="post"><p style="font-size: 15px;color: #BBBBBB;display: inline-block">圆圆圆价：</p><p style="display: inline-block;color: red;font-size: 25px">￥<?php echo $arr[0]['unitprice']?></p><br>
        数量：<input type="number"style="width:50px;height: 20px" name="shuliang"><br>
            <button>加入购物车</button></form>
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
</script>
</body>
</html>
