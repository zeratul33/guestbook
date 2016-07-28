<?php
/**
 * Created by PhpStorm.
 * User: Zeratul
 * Date: 2016/6/14
 * Time: 13:51
 */
function check_code($code, $id = ""){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}
?>