<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="/weixinshop/static/css/admin/css.css" rel="stylesheet"/>
    <title>login</title>
    <style>body {
            background-color:#f6f8f9;
            background-image:none;
        }
        .login h1 img{ vertical-align:bottom;}
    </style>
</head>
<body>
<div class="login">
    <h1>
        <img src="/weixinshop/static/images/admin/weixin.png" width="32" style="float:left; margin-right:10px;"/>智风微信商城管理系统</h1>
    <form action="/weixinshop/index.php?g=admin&m=index&a=login" method="post" id="myform">
        <div>
            <img src="/weixinshop/static/images/admin/login-top.jpg" />
        </div>
        <div class="login-center">
            <ul><li> 用户名:<br /><input name="username" type="text" class="input-text1" value="" style="width:320px;padding:0px 8px;"/></li>
                <li> 密 码:<br /><input name="password" type="password" class="input-text1" style="width:320px;padding:0px 8px;"/></li>
                <li> 验证码:<br /><input name="verify_code" type="text" class="input-text1" style="width:160px;padding:0px 8px;"/><img src="/weixinshop/index.php?g=admin&m=index&a=verify_code&t=1428480309"  title="点击刷新验证码" class="verify_img" id="verify"  style="cursor:pointer; vertical-align:bottom; margin-left:5px;"></li><li><input name="remember" type="checkbox" value="1" class="remember-me"/><span class="fz12 fc999 remember-me2">&nbsp;记住我的登录信息</span></li>
            </ul>
        </div>
        <div>
            <img src="/weixinshop/static/images/admin/login_bottom.jpg" />
        </div>
        <input type="submit" value="  " name="do" class="login-button" style="cursor:pointer;"/>
    </form></div><script language="javascript" type="text/javascript" src="/weixinshop/static/js/jquery/jquery.js">

</script>
<script>
    $(function(){
        if(self != top){
            top.location = self.location;
        }

        $(".verify_img").click(function(){
            var timenow = new Date().getTime();
            $(this).attr("src","/weixinshop/index.php?g=admin&m=index&a=verify_code&"+timenow)
        });
    });
</script>
</body>
</html>