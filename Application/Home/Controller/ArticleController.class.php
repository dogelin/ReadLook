<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
    	$this->show(I('id'));
    	$this->other(I('id'));
    	$this->display();
    }
    public function show($id){
    	$artss = D('article')->where(array('id'=>$id))->find();
    	$this->assign('artss',$artss);
    	$caten = D('cate')->where(array('id'=>$artss['cateid']))->find();
    	$this->assign('caten',$caten['catename']);
    }
    public function other($id){ 
    	$pre = D('article')->where('id>'.$id)->order('id asc')->find();
    	$this->assign('pre',$pre);
    	$next = D('article')->where('id<'.$id)->order('id desc')->find();;
    	$this->assign('next',$next);
    }
    
}