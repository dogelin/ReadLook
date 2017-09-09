<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <link href="http://127.0.0.1/ykj/Application/Public/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" value=""  size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" value="" id="password" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label>验证码：</label>
                        <input type="text" name="verify" value="" id="verify" size="15" class="admin_input_style" />
                    	&nbsp;&nbsp;
                    	<img style="curior:pointer;" onclick="this.src='/ykj/index.php/Admin/Login/verify/'+Math.random()" src="/ykj/index.php/Admin/Login/verify" height="30px" width="100px";
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>