<?php
namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;
use Think\Image;
use Think\Model;
class LoginController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function show()
    {
    	$this->display('login');
    }

    public function verify(){
        $verify=new \Think\Verify();
        $verify->fontSize=30;
        $verify->lenght=1;
        $verify->entry();

    }
    public function login(){
        if(!IS_POST){E("页面不存在");}
        $code=I('yanzhengma');
        if(check_code($code)===false){$this->error('验证码错误');}

        $username=I('username');

        $password=I('password','','md5');

        $user=M('admin')->where(array('username'=>$username))->find();
        if(!$user || $user['password']!=$password){$this->error("账号或密码错误");}
        if($user['lock']==1){$this->error("锁定");}
        $data=array('logintime'=>date("Y-m-d H:i:s"),'loginip'=>get_client_ip(),'id'=>$user['id'],);
        M('admin')->save($data);



        session(C('USER_AUTH_KEY'),$user['id']);
        session('logintime',$user['logintime']);
        session('loginip',$user['loginip']);
        session('username',$user['username']);

        if($user['username']==C('RBAC_SUPERADMIN'))
        {
            session(C('ADMIN_AUTH_KEY'),true);
        }
        else session(C('ADMIN_AUTH_KEY'),null);

        import('Org.Util.Rbac');
        Rbac::saveAccessList();
//        p($_SESSION);
//        die;

        $this->redirect('Admin/index/index');



    }
}