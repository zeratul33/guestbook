<?php
/**
 * Created by PhpStorm.
 * User: Zeratul
 * Date: 2016/7/10
 * Time: 14:07
 */
//重组数组
function node_merge($node,$access=null,$pid=0){

    $arr=array();
        foreach ($node as $v){
            if(is_array($access)){
                $v['access']=in_array($v['id'],$access)?1:0;
            }
            if($v['pid']==$pid){
                $v['child']=node_merge($node,$access,$v['id']);
                $arr[]=$v;

            }

            //print_r($arr);
        }

        return $arr;
}
function p($array){
    echo "<pre>";
    print_r($array);
}
function check_code($code, $id = ""){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}
?>