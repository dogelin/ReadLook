<?php
	namespace Admin\Model;
	use Think\Model;
	class AdminModel extends Model{
	    protected $_validate = array(
	    	array('username','require','用户名不得为空！',1,'regex',3), //默认情况下用正则进行验证     
	    	array('username','','管理员已经存在！',1,'unique',3), // 在新增的时候验证name字段是否唯一 
	    	array('password','require','密码不得为空！',1,'regex',3), 
	    	array('username','require','用户名不得为空！',1,'regex',4),
	    	array('password','require','用户名不得为空！',1,'regex',4),      
	    	array('verify','check_verify','验证码错误！',1,'callback',4),      
	    );
	    public function login(){ 	
	    	 $password = $this->password;
	    	 $username = $this->username;
	    	 $info = $this->where(array("username"=>$username))->find();
	    	 if($info){
	    	 	if($info['password'] == md5(md5($password))){
	    	 		session('id',$info['id']);
	    	 		session('username',$info['username']);
	    	 		return true;
	    	 	}
	    	 	return false;
	    	 }else{	
	    	 	return false;
	    	 }
    	}
    	function check_verify($code, $id = ''){    
    		$verify = new \Think\Verify();    
    		return $verify->check($code, $id);
    		}
    	

	}
?>