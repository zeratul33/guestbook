<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
//    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
//    }
    public function index(){
        $this->display('index');

    }
    public function bbs(){


        $content = M('content');
        $message =$content->select();
        $count = $content->where('id>=0')->count();
        $page = new \Org\Util\AjaxPage($count,10,"news");
        $page->setConfig('header','条记录');
        $list = $content->where('id>=0')->order('time desc')->limit($page->firstRow.",".$page->listRows)->select();
        $show = $page->show();
        $this->assign('cont',$message);
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display('bbs');

    }
    public function result(){
        $say = I('post.');
        $say['time']=date('Y-m-d H:i:s');
        $say['userip']=get_client_ip();
        $content = M('content');
        $code = I('yanzhengma');
        if (!I('username')||!I('content'))
            $this->error('内容不能为空');
        if(check_code($code)===false)
            $this->error('验证码错误');
        if($content->add($say))
            $this->success('发表成功');
        else $this->error('发表失败');



    }
    public function report(){
        $report=I('report');
        $content = M('content');
        $del = $content->where("id=".$report)->find();

        $contentTOdel=M('del');
        $deleted=$contentTOdel->where("id=".$report)->find();
        if($deleted!=NULL){
            $this->error('已经举报过了');
        }
        $del['reportTime']=date("Y-m-d H:i:s");
        $contentTOdel->data($del)->add();
        $this->success('success');
    }
    public function verify(){
        $verify = new \Think\Verify();
        $verify->fontSize=30;
        $verify->entry();
    }

}