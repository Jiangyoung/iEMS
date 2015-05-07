<!doctype html>
<html>
<head>

    <?php $this->load('widget/header.php'); ?>
    <link href="<?php echo $this->getFileUrl('static/css/admin/admin_index.css'); ?>" rel="stylesheet"/>
</head>
<body>
<div id="header">
    <div class="logo">
        <a href="<?php echo $this->getFileUrl('admin.php');?>" title="管理中心"></a>
    </div>
    <div class="fr">
        <div class="cut_line admin_info tr">
            <a href="./" target="_blank">网站首页</a>
            <span class="cut">|</span>1：<span class="mr10">admin</span>
            <a href="admin.php?c=user&a=logout">[注销]</a>
        </div>
    </div>
</div>
<div class="content">
    <div class="left_menu fl">

        <h3 class="f14">数据管理</h3>
        <ul>
            <li class="sub_menu">
                <a href="">后台首页</a>
            </li>
            <li class="sub_menu">
                <a href="">管理员管理</a>
            </li>
            <li class="sub_menu">
                <a href="">设备管理</a>
            </li>
            <li class="sub_menu">
                <a href="">设备分类</a>
            </li>
            <li class="sub_menu">
                <a href="">添加商品</a>
            </li>
            <li class="sub_menu">
                <a href="">品牌管理</a>
            </li>
        </ul>

    </div>
    <div class="right_main">
        <iframe id="rframe" src="index.php" frameborder="0" scrolling="auto" style="height:100%;width:100%;"></iframe>
    </div>
</div>
</body>
</html>