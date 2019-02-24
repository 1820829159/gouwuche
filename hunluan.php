<?php
include_once "Mysql.class.php";
include_once "mysqsl.config.php";
$s=new shuju();
$config=$s->shu('y_user');
$m=new Mysql($config);
?>