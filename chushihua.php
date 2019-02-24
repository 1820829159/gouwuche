<?php
/*
 作用：框架初始化
 */

//过滤参数，用递归方式过滤

//设置报错级别
define('Debug',ture);

if(define('Debug')){
    error_report(E_ALL);
}else{
    error_reporting(0);
}
?>