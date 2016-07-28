<?php
/**
 * Created by PhpStorm.
 * User: Zeratul
 * Date: 2016/6/11
 * Time: 21:48
 */
    namespace Admin\Controller;
    use Org\Util\Rbac;
    use Think\Controller;
    Class CommonController extends Controller{
        public function _initialize()
        {
            if(!isset($_SESSION[C('USER_AUTH_KEY')])){
                $this->redirect('Admin/login/index');
            }

            $notauth=in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))||in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
            if(C('USER_AUTH_ON')&&!$notauth)
            {
                import('Org.Util.Rbac');
                Rbac::AccessDecision()||$this->error('没有权限');
               // echo MODULE_NAME."-".CONTROLLER_NAME."-".ACTION_NAME;
            }



        }
    }