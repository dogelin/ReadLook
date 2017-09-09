<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$admin = D('admin');
    	if(IS_POST){
    		if($admin->create($_POST,4)){
    			if($admin->login()){
    				$this->success('登录成功，跳转中。。。',U('Index/index'));
    			}else{
    				dump($_POST);
    				//$this->error('用户名或密码错误');
    			}
    		}else{
    			$this->error($admin->getError());
    		}
    		return;
    	}
    	if(session('id')){
    		$this->error('请勿重复登录');
    	}else{
    		$this->display('login');
    	}
    	
    }
    public function verify(){
    	$config =    array(    
    	'fontSize'    =>    35,    // 验证码字体大小    
    	'length'      =>    4,     // 验证码位数    
    	'useNoise'    =>    true, // 验证码杂点
    	);
    	$Verify =     new \Think\Verify($config);
    	$Verify->entry();
    	
    }
    }