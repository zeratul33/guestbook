<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends CommonController {

    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    public function show()
    {
    	$this->display('admin');
    }
    public function logout(){
        session_unset();
        session_destroy();
//        $sess = M('session');
//        $sess1 = session('uid');
//        p($sess1);die;
        $this->redirect('Admin/login/index');
    }

    public function content(){
        $content = M('content');
        $message = $content->select();
        $count = $content->where('id>=0')->count();
        $page = new \Think\Page($count,10);
        $list = $content ->where('id>=0')->order('id desc')->limit($page->firstRow.",".$page->listRows)->select();
        $show = $page->show();

        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display('content');

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
    public function contentDel(){
        $content=M('del');

        $count = $content->where('id>=0')->count();
        $page = new \Think\Page($count,10);
        $list = $content ->where('id>=0')->order('id desc')->limit($page->firstRow.",".$page->listRows)->select();
        $show = $page->show();

        $this->assign('del',$list);
        $this->assign('page',$show);

        $this->display('report');
    }

    public function delHandle(){
        $id = I('delid');
        $content = M('content');
        $delreport = M('delreport');
        $del = $content->where('id='.$id)->find();
        $del2=$delreport->where('id='.$id)->find();
        if ($del2!=NULL)
        {
            $content2=M('del');
            $content2->where('id='.$id)->delete();
            $this->error('error');
        }
        $del2=$del;
        $del2['deltime']=date("Y-m-d H:i:s");
        $del2['controlleruid']=session('uid');
        $delreport->data($del2)->add();
        $content->data($del)->delete();
        $content2=M('del');
        $content2->where('id='.$id)->delete();
        $this->success('success');


    }
    public function delreport(){
        $content=M('delreport');

        $count = $content->where('id>=0')->count();
        $page = new \Think\Page($count,6);
        $list = $content ->where('id>=0')->order('id desc')->limit($page->firstRow.",".$page->listRows)->select();
        $show = $page->show();

        $this->assign('del',$list);
        $this->assign('page',$show);
        $this->display('delreport');
    }
}