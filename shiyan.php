<?php
session_start();
$username=$_SESSION['gname'];
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
        <title>圆圆圆网-后台管理</title>
    </head>
    <body style="background: #F4F7F4">
    <div id="fixx">
        <div class="rightd2">
            <ul class="shape"><li>
                    <?php
                    echo $username;
                    ?></li>
                <li>
                    <?php
                    if(empty($username)){echo'<a href="zhuce.html">免费注册</a> ';}
                    else{echo '您好';}
                    ?></li>
            </ul>
        </div>
        <div class="leftd2">
            <ul class="shape">
                <li><a href="che.php">购物车</a></li>
                <li id="shangjia"><a href="maijia.php">卖家中心</a>
                    <ul id="list"><li id="kaidian"><a href="maizhuce.html">免费开店</a></li><br><li>我的商品</li></ul>
                </li>
                <li><a href="zhuye.php">商品分类</a> </li>
            </ul>
        </div></div>
    <div id="lleft">
        <div class="toutou">管理菜单</div>
        <div class="ttt">
            <div onclick="hid('one')" id="l1">分类列表</div>
            <div onclick="hid('two')" id="l2">商品添加</div>
            <div onclick="hid('three')" id="l3">商品列表</div>
            <div onclick="hid('four')" id="l4">分类添加</div>
            <div onclick="hid('five')" id="l5">会员管理</div>
        </div>
    </div><div id="rright" style="display: block">
        <p style="font-size: 30px">商品分类</p><div class="tao">
    <table cellpadding="0" cellspacing="0"><thead>
        <tr>
            <td>分类名称</td>
            <td>操作</td>
        </tr>
        </thead>
    <?php
    $array = getTree($parent);
    foreach($array as $value){
        echo '<tr><td>'.str_repeat('-',$value['level']).$value['name'].'</td>';
       ?><td><a href="xiugai.php?id=<?php echo $value['id']?>">修改</a>&nbsp;&nbsp;&nbsp;<a href="shan.php?id=<?php echo $value['id']?>">删除</a></td></tr>
     <?php }?></table></div>
    </div>
    <div id="rright2" style="display: none"><p style="font-size: 30px">添加商品</p><div class="tao">
        <form action="tianjia.php" method="post" class="tianjia" enctype="multipart/form-data">
            商品名称:<input type="text" name="name" style="width: 130px;height: 20px" ><br>
            商品单价:<input type="number"  min="0.01" name="unitprice" style="height: 20px;width:50px"><br><br>
            商品分类:<select name="pid" style="width:100px;height: 20px">
                <?php foreach ($array as $value):if($value['level']==1):?><option value="<?php echo $value['id']?>"><?php echo $value['name'] ?></option>
                <?php endif;endforeach;?>
            商品描述:<textarea name="unitcontent" style="width:300px;height: 70px;vertical-align: top"></textarea><br>
            上传图片：<input type="file" name="file">
            <button type="submit" class="quet">确定添加</button>
        </form></div>
    </div>
    <div id="rright3" style="display: none">
        <p>商品列表</p>
    </div>
    <div id="rright4" style="display: none">
        <p>分类添加</p>
        <div class="tao"><form action="tianfen.php" method="post" class="tianfen">
                上级分类：<select name="jibie" style="width:100px;height: 20px">
                    <option value="0">顶级分类</option>
                    <?php foreach ($array as $value):if($value['pid']==0):?><option value="<?php echo $value['id']?>"><?php echo $value['name'] ?></option>
                    <?php endif;endforeach;?>
                </select><br>
                分类名称：<input type="text" value="" name="fenming" style="width:200px;height: 20px"><br>
                <button type="submit" class="quet">确定添加</button>
            </form></div>
    </div>
    <div id="rright5" style="display: none"><p>没有...</p></div>
    <script type="text/javascript">
       function hid(num){
            let rone=document.getElementById('rright');
        let rtwo=document.getElementById('rright2');
        let rthree=document.getElementById('rright3');
        let rfour=document.getElementById('rright4');
        let rfive=document.getElementById('rright5');
           let lfive=document.getElementById('l5');
           let lone=document.getElementById('l1');
           let ltwo=document.getElementById('l2');
           let lthree=document.getElementById('l3');
           let lfour=document.getElementById('l4');
        rone.style.display="none";
        rtwo.style.display="none";
        rthree.style.display="none";
        rfour.style.display="none";
        rfive.style.display="none";
        lone.style.backgroundColor="#F4F7F4";
           ltwo.style.backgroundColor="#F4F7F4";
           lthree.style.background="#F4F7F4";
           lfour.style.background="#F4F7F4";
           lfive.style.background="#F4F7F4";
           num='r'+num;
        eval(num).style.display="block";
        num='l'+num;
        eval(num).style.backgroundColor="blue"
        }
    </script>
    </body>
    </html>