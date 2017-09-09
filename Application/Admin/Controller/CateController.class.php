<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends CommonController {
    public function index(){
		$this->display();
    }
    public function lst(){
    	$cate = D('cate');
    	$cateres = $cate->order('id asc')->select();
    	$this->assign('cateres',$cateres);
		$this->display();
    }
    public function add(){
    	$cate = D('cate');
    	if(IS_POST){
    		$data['catename'] = I('catename');
    		if($cate->create($data)){    			
    			if($cate->add()){
    				$this->success('添加栏目成功!',U('lst'));
    			}else{
    				$this->error('添加栏目失败！');	
    			}
    		}else{
    			$this->error($cate->getError());
    		}
    		return;
    	}
		$this->display();
    }
    public function edit(){
    	$cate = D('cate');
    	$cates = $cate->find(I('id'));
    	$this->assign('cates',$cates);
    	if(IS_POST){
    		$data['catename'] = I('catename');
    		$data['id'] = I('id');
    		if($cate->create($data)){    			
    			if($cate->save() !==false){
    				$this->success('修改栏目成功!',U('lst'));
    			}else{
    				$this->error('修改栏目失败！');	
    			}
    		}else{
    			$this->error($cate->getError());
    		}
    		return;
    	}
		$this->display();
    }
    public function del(){
		$cate = D('cate');
 		if($cate->delete(I('id'))){
 			$this->success('删除栏目成功',U('lst'));
 		}else{
 			$this->error('删除栏目失败!');
 		}
		
    }
}