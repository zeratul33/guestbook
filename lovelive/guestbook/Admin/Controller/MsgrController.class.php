<?php
/**
 * Created by PhpStorm.
 * User: Zeratul
 * Date: 2016/7/16
 * Time: 22:12
 */
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class MsgrController extends Controller{
    public function index(){
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