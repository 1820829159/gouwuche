<?php
$pid=$_GET['pid'];
if(empty($_GET['page'])){
$page=1;
}else{
$page=$_GET['page'];
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="zhuye.css" rel="stylesheet" type="text/css">
    <title><?php echo $pid ;?></title>
</head>
<body>
<?php
$con=mysqli_connect('localhost','root','root');
mysqli_query($con,'set names utf8');
mysqli_select_db($con,'y_user');
$sql="select count(*) from goods where pid='$pid'";
$totalresult=mysqli_query($con,$sql);
$total=mysqli_fetch_row($totalresult)[0];
$num=5;//每一页显示5条数据
$totalpage=ceil($total/$num);
if($page>$totalpage){
    $page=$totalpage;
}
if($page<1){
    $page=1;
}
$start=($page-1)*5;
$sql="select * from goods where pid='$pid' limit $start,5";
$array=mysqli_query($con,$sql);
?>
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
<div class="logo1"><div class="biaoqian"><?php echo $pid;?></div>
    <form class="btnf-search" action="zy-search.php"><input type="text" class="search" placeholder="请输入商品"><button class="btn-search">搜索</button></form>
</div>
<div class="content">
    <div class="fenhou">
    <?php
    foreach ($array as $k=>$v){?>
        <div onclick="ddds(<?php echo $v['id']?>)">
            <img src="<?php echo $v['img']?>" style="width: 250px;height: 250px">
            <p class="uname"><?php echo $v['uname']?></p>
            <p class="unitprice" style="color: red;font-size: 20px">￥<?php echo $v['unitprice'] ?></p>
            <div class="ucontent"><?php echo $v['ucontent'] ?></div>
        </div>
    <?php }?>
    </div>
</div>

<script>
    function ddds(s) {
        window.location.href="shangpin.php?id="+encodeURIComponent(s);
    }
</script>
</body>
</html>
