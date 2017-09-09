<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends CommonController {
    public function index(){
		$this->display();
    }
    public function lst(){
    	$link = D('link');
		$count = $link->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$linkres = $link->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('linkres',$linkres);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
    }
    public function add(){
    	$link = D('link');
    	if(IS_POST){
    		$data['title'] = I('title');
    		$data['url'] = I('url');
    		$data['desc'] = I('desc');
    		if($link->create($data)){    			
    			if($link->add()){
    				$this->success('添加链接加成功!',U('lst'));
    			}else{
    				$this->error('添加链接失败！');	
    			}
    		}else{
    			$this->error($link->getError());
    		}
    		return;
    	}
		$this->display();
    }
    public function edit(){
    	$link = D('link');
    	$linkres = $link->find(I('id'));
    	$this->assign('linkres',$linkres);
    	if(IS_POST){
    		$data['title'] = I('title');
    		$data['url'] = I('url');
    		$data['desc'] = I('desc');
    		$data['id'] = I('id');
    		if($link->create($data)){    			
    			if($link->save() !==false){
    				$this->success('修改链接成功!',U('lst'));
    			}else{
    				$this->error('修改链接失败！');	
    			}
    		}else{
    			$this->error($link->getError());
    		}
    		return;
    	}
		$this->display();
    }
    public function del(){
		$link = D('link');
 		if($link->delete(I('id'))){
 			$this->success('删除栏目成功',U('lst'));
 		}else{
 			$this->error('删除栏目失败!');
 		}
		
    }
}