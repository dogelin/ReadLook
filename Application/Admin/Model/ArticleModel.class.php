<?php
	namespace Admin\Model;
	use Think\Model;
	class ArticleModel extends Model{
	    protected $_validate = array(
	    	array('title','require','文章名称不得为空！',1,'regex',3), 
	    	array('title','','文章已经存在！',1,'unique',3),  
	    	array('desc','require','描述不得为空！',1,'regex',3), 
	    	array('cateid','require','栏目不得为空！',1,'regex',3), 
	    	array('content','require','内容不得为空！',1,'regex',3), 
	    	 
	    );
	}
?>