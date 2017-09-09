<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function __construct(){
    	parent::__construct();
    	$this->nav();
    	$this->news();
    	$this->link();
    }
    public function nav(){
    	$cate = D('cate');
    	$cateres = $cate->select();
    	$this->assign('cateres',$cateres);
    }
    public function news(){
    	$art = D('article');
    	$arts = $art->order('id desc')->limit('8')->select();
    	$this->assign('arts',$arts);
    }
    public function link(){
    	$link = D('link');
    	$linkres = $link->select();
    	$this->assign('linkres',$linkres);
    }
    
}