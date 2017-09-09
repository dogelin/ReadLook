<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends CommonController {
    public function index(){
		$this->display();
    }
    public function lst(){
    	$art = D('ArticleView');
		$count = $art->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$artres = $art->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('artres',$artres);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
    }
    public function add(){
    	$art = D('article');
    	$cate = D('cate');
    	$cateres = $cate->select();
    	$this->assign('cateres',$cateres);
    	if(IS_POST){
    		$data['title'] = I('title');
    		$data['desc'] = I('desc');
    		$data['content'] = I('content');
    		$data['cateid'] = I('cateid');
    		$data['time'] = date('y-m-d h:i:s',time());
            //dump($_FILES);exit;
    		if($_FILES['pic']['tmp_name'] != ''){
    			$upload = new \Think\Upload();// 实例化上传类
    			$upload->maxSize = 3145728 ;// 设置附件上传大小
    			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
    			$upload->rootPath  =      './'; 
                //dump($_FILES['pic']);exit;
    			 $info   =   $upload->uploadOne($_FILES['pic']);
                 dump($info);exit;
    			 if(!$info) {// 上传错误提示错误信息
    			 	$this->error($upload->getError());
    			 }else{// 上传成功 获取上传文件信息
    			 	$data['pic'] = $info['savepath'].$info['savename']; 
                    
    			}
    		} 
    		if($art->create($data)){    			
    			if($art->add()){
    				$this->success('添加文章成功!',U('lst'));
    			}else{
    				$this->error('添加失败！');	
    			}
    		}else{
    			$this->error($art->getError());
    		}
    		return;
    	}
		$this->display();
    }
    public function edit(){
    	$art = D('article');
    	$artres = $art->find(I('id'));
    	$this->assign('artres',$artres);
    	$cate = D('cate');
    	$cateres = $cate->select();
    	$this->assign('cateres',$cateres);
    	if(IS_POST){
    		$data['title'] = I('title');
    		$data['desc'] = I('desc');
    		$data['content'] = I('content');
    		$data['cateid'] = I('cateid');
    		$data['id'] = I('id');
    		$data['time'] = date('y-m-d h:i:s',time());
    		if($_FILES['pic']['tmp_name'] != ''){
    			$upload = new \Think\Upload();// 实例化上传类
    			$upload->maxSize = 3145728 ;// 设置附件上传大小
    			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    			$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
    			$upload->rootPath  =      './'; 
    			 $info   =   $upload->uploadOne($_FILES['pic']);
    			 if(!$info) {// 上传错误提示错误信息
    			 	$this->error($upload->getError());
    			 }else{// 上传成功 获取上传文件信息
    			 	$data['pic'] = $info['savepath'].$info['savename']; 
    			}
    		} 
    		if($art->create($data)){    			
    			if($art->save()){
    				$this->success('修改文章成功!',U('lst'));
    			}else{
    				$this->error('修改失败！');	
    			}
    		}else{
    			$this->error($art->getError());
    		}
    		return;
    	}
		$this->display();
    }
    public function del(){
		$art = D('article');
 		if($art->delete(I('id'))){
 			$this->success('删除文章成功',U('lst'));
 		}else{
 			$this->error('删除文章失败!');
 		}
		
    }
}