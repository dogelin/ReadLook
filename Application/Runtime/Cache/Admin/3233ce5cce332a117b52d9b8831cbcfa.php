<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/ykj/Application/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1/ykj/Application/Public/css/main.css"/>
    <script type="text/javascript" src="http://127.0.0.1/ykj/Application/Public/js/libs/modernizr.min.js"></script>
    <style>
    	.result-tab tr th,td{
    		text-align:center;
    		text-overflow: ellipsis;
			white-space: nowrap;
			overflow: hidden; 
    	}
    </style>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="/ykj/index.php/Home/Index/index" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
                <li><a href="/ykj/index.php/Admin/Admin/edit/id/<?php echo $_SESSION['id']; ?>">修改密码</a></li>
                <li><a href="/ykj/index.php/Admin/Admin/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/ykj/index.php/Admin/Article/lst"><i class="icon-font">&#xe008;</i>文章管理</a></li>
                        <li><a href="/ykj/index.php/Admin/Cate/lst"><i class="icon-font">&#xe005;</i>栏目管理</a></li>
                        <li><a href="/ykj/index.php/Admin/Link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                        <li><a href="/ykj/index.php/Admin/Admin/lst"><i class="icon-font">&#xe033;</i>管理员管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">作品管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/ykj/index.php/Admin/Article/add"><i class="icon-font"></i>新增栏目</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%" style="table-layout: fixed;">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox" width=" 5%"></th>
                            <th width="5%">ID</th>
                            <th width="15%">文章标题</th>
                            <th width="10%">缩略图</th>
                            <th width="35%">文章内容</th>
                            <th width="10%">所属栏目</th>
                            <th width="10%">发表时间</th>
                            <th width="10%">操作</th>
                        </tr>
                        <?php if(is_array($artres)): $i = 0; $__LIST__ = $artres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                            <td class="tc" ><input name="id[]" value="59" type="checkbox"></td>
                            <td ><?php echo ($vo["id"]); ?></td>
                            <td title="<?php echo ($vo["title"]); ?>" ><a target="_blank" href="#" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a>
                            </td>
                            <td align="center">
                            <?php if($vo['pic'] != ''): ?><img src="/ykj<?php echo ($vo["pic"]); ?>" height="50px" width="50px"/>
                            	<?php else: ?>
                            	暂无缩略图<?php endif; ?>
                            	
                            </td>
                            <td title="<?php echo ($vo["content"]); ?>" ><?php echo ($vo["content"]); ?>
                            </td>
                            <td title="<?php echo ($vo["cateid"]); ?>" ><?php echo ($vo["catename"]); ?>
                            </td>
                            <td title="<?php echo ($vo["time"]); ?>" ><?php echo ($vo["time"]); ?>                      
                            </td>
                            <td >
                                <a class="link-update" href="/ykj/index.php/Admin/Article/edit/id/<?php echo ($vo["id"]); ?>">修改</a>&nbsp;&nbsp;
                                <a class="link-del" onclick="return confirm('确定删除？')" href="/ykj/index.php/Admin/Article/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="list-page"><?php echo ($page); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>