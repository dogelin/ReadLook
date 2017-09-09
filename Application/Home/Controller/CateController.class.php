<?php
namespace Home\Controller;
use Think\Controller;
class CateController extends CommonController {
    public function index(){
    	$this->lst(I('id'));
    	$this->current();
    	$this->display();
    }
    public function lst($cateid){   	
    	$art = D('article');
		$count = $art->where(array('cateid'=>$cateid))->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$artres = $art->where(array('cateid'=>$cateid))->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('artres',$artres);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
    	
    }
    public function current(){
    	$current = I('id');
    	$this->assign('current',$current);
    }
    
}