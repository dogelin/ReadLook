<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {
    public function index(){
		$this->display();
    }
    public function lst(){
    	$admin = D('admin');
    	$adminres = $admin->order('id asc')->select();
    	$this->assign('adminres',$adminres);
		$this->display();
    }
    public function add(){
    	$admin = D('admin');
    	if(IS_POST){
    		$data['username'] = I('username');   		
    		if(I('password') != ''){
    			$data['password'] = md5(md5(I('password')));
    		}else{
    			$data['password'] ='';
    		}
    		if($admin->create($data)){    			
    			if($admin->add()){
    				$this->success('添加管理员成功!',U('lst'));
    			}else{
    				$this->error('添加管理员失败！');	
    			}
    		}else{
    			$this->error($admin->getError());
    		}
    		return;
    	}
		$this->display();
    }
    public function edit(){
    	$admin = D('admin');
    	$admins = $admin->find(I('id'));
    	$this->assign('admins',$admins);
    	if(IS_POST){
    		$data['username'] = $admins['username'];
    		if(I('password') != ''){
    			$data['password'] = md5(md5(I('password')));
    		}else{
    			$data['password'] ='';
    		}
    		$data['id'] = I('id');
    		if($admin->create($data)){    			
    			if($admin->save() !==false){
    				$this->success('修改密码成功!',U('lst'));
    			}else{
    				$this->error('修改密码失败！');	
    			}
    		}else{
    			$this->error($admin->getError());
    		}
    		return;
    	}
		$this->display();
    }
    public function del(){
		$admin = D('admin');
		$ad = $admin->find(I('id'));
		if($ad['username'] != 'admin'){
 			if($admin->delete(I('id'))){
 				$this->success('删除管理员成功',U('lst'));
 			}else{
 				$this->error('删除管理员失败!');
 			}
		}else{
			$this->error('超级管理员不能被删除！');
		}
    }
    function logout(){
    		session(null); 
    		$this->success('退出成功',U('Login/index'));
    	}
}