<?php

//封装一个调试的方法
function p($var){
    dump($var);die;
}

//封装无限极分类的方法
function getSons($arr,$pid=0,$level=0){
    static $result = array(); //定义一个静态的数组，此数组只会初始化一次
    foreach($arr as $v){
        //先找出顶级栏目pid=0
        if($v['pid'] == $pid){
            $v['level']=$level; //给当前数组$v加一个元素level
            $result[ $v['id'] ]=$v;  //使用id的值作为二维数组的索引下标   //把$v移动到静态数组$result
            getSons($arr,$v['id'],$level+1); //递归调用自身
        }
    }
    //返回结果
    return $result;
}