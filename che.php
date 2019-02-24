<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="zhuye.css" rel="stylesheet" type="text/css">
    <title>购物车</title>
</head>
<?php
session_start();
$username=$_SESSION['name'];
if(empty($username)){
    header("location:dengl.html?ret='che.php'");
    exit;
}
?>
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
            <li><a href="maijia.php">卖家中心</a></li>
            <li><a href="zhuye.php">圆圆主页</a> </li>
        </ul>
    </div></div>
<table class="gouwuche">
    <thead>
    <tr>
        <th>商品信息</th>
        <th>购买数量</th>
        <th>单价</th>
        <th>金额</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody clss="xunhuan" style="table-layout: fixed">
    <?php
    if(empty($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
    $con=mysqli_connect('localhost','root','root');
    mysqli_query($con,'set names utf8');
    mysqli_select_db($con,'y_user');
    $sql="select count(*) from b_goods where username='$username'";
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
    $sql="select * from b_goods where username='$username' limit $start,5";
    $arr=mysqli_query($con,$sql);
    foreach ($arr as $k=>$value) {
    ?><tr>
        <td><?php echo $value['name']?></td>
        <td>
            <input class="shuliang" type="number" value="<?php echo $value['count']?>">
        <td><?php echo $value['unitprice']?></td>
        <td><?php echo $value['price']?></td>
        <td class="yichu"><a href="shanchu.php?id='<?php echo $value['id']?>'">移除</a> </td>
    </tr><?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="5">
            <a href="?page=1">首页</a>
            <a href="?page=<?php echo $page-1;?>">上一页</a>
            <a href="?page=<?php echo $page+1;?>">下一页</a>
            <a href="?page=<?php echo $totalpage;?>">尾页</a>
        </td>
    </tr>
    <tr>
        <th>合计</th>
        <th></th>
        <th></th>
        <th></th>
        <th class="jiesuan"><a href="submit.php">结算</a></th>
    </tr>
    </tfoot>
</table>
</body>
</html>