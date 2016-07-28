<?php
namespace Admin\Controller;
/**
 * Created by PhpStorm.
 * User: Zeratul
 * Date: 2016/7/2
 * Time: 22:49
 */

class RbacController extends CommonController {
    //用户列表
    public function index(){
        $this->result = D('UserRelation')->field('password',true)->relation(true)->select();

        $this->display('Rbac_index');
    }
    //角色列表
    public function role(){
        $role=M('role')->select();
        $this->assign('role',$role);
        $this->display('Rbac_role');
    }
    //节点列表
    public function node(){
        $field=array('id','name','title','pid');
        $node=M('node')->field($field)->order('sort')->select();
        $node=node_merge($node);

        $this->assign('node',$node);
        $this->display('Rbac_node');
    }
    //添加用户
    public function addUser(){
        $this->role=M('role')->select();
        $this->display('Rbac_adduser');
    }
    //添加用户处理
    public function addUserHandle(){
        $user=array('username'=>I('username'),
                    'password'=>I('password','','md5'),
                    'loginip'=>get_client_ip(),
                    'logintime'=>date('Y-m-d H:i:s'));
        $role=array();

        if($uid=M('admin')->add($user)){
            foreach($_POST['role_id'] as $v)
            {
                $role[]=array('role_id'=>$v,
                              'user_id'=>$uid);
            }
        }
        if(M('role_user')->addAll($role)){
            $this->success('添加成功',U('Admin/Rbac/index'));
        }
        else $this->error('false');
    }
    //添加角色
    public function addRole(){
        $this->display('Rbac_addRole');
    }
    //添加角色处理
    public function addRoleHandle(){
        if($_POST['name']==NULL||$_POST['remark']==NULL||$_POST['status']==NULL){$this->error('名称、描述、状态都不能为空');}
        if(M('role')->add($_POST))
            {
                $this->success('添加成功',U('Admin/Rbac/role'));
            }
        else $this->error('添加失败');
    }
    //添加节点
    public function addNode(){
        $this->pid=I('pid',0,'intval');
        $this->level=I('level',1,'intval');
        switch($this->level){
            case 1 :$this->type='应用';break;
            case 2 :$this->type='控制器';break;
            case 3 :$this->type='动作方法';break;
        }

        $this->display('Rbac_addNode');
    }
    public function addNodeHandle(){
        if(M('node')->add($_POST))
            $this->success('添加成功',U('Admin/Rbac/node'));
        else
            $this->error('添加失败');
    }
    //配置权限方法
    public function access(){
        $rid=I('rid',0,'intval');
        $field=array('id','name','title','pid');
        $node=M('node')->order('sort')->select();
        //原有权限
        $access=M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
        $node=node_merge($node,$access);


        $this->rid=$rid;
        $this->assign('node',$node);
        $this->display('Rbac_access');
    }
    public function setAccess(){
        $rid=I('rid',0,'intval');


        $db=M('access');
        $db->where(array('role_id'=>$rid))->delete();
        $data=array();
        foreach ($_POST['access'] as $v)
        {

            $tmp=explode('_',$v);
            $data[]=array('role_id'=>$rid,
            'node_id'=>$tmp[0],
            'level'=>$tmp[1]
            );

        }

        if($db->addAll($data))
            $this->success('提交成功',U('Admin/Rbac/role'));
        else
            $this->error('提交失败');
    }
    public function lockoff(){
        $a=$_GET;
        $lock=M('admin');
        $lock2=$lock->where($a)->select();

        $lock2['lock']=1;
        if(M('admin')->where($a)->save($lock2)){
            $this->success('修改成功');
        }


    }
    public function lockon(){
        $a=$_GET;
        $lock=M('admin');
        $lock2=$lock->where($a)->select();
        $lock2['lock']=0;
        if(M('admin')->where($a)->save($lock2)){
            $this->success('修改成功');
        }
    }
}

