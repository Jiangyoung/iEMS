<!doctype html>
<html class="off">
<head>

    <?php $this->load('widget/header.php'); ?>

    <link rel="stylesheet" type="text/css" href="/weixinshop/static/css/admin/style.css" />

</head>
<body scroll="no">
<div id="header">
    <div class="logo">
        <a href="<?php echo $this->getFileUrl('admin.php');?>" title="管理中心"></a>
    </div>
    <div class="fr"><div class="cut_line admin_info tr">
            <a href="./" target="_blank">网站首页</a>
            <span class="cut">|</span>1：<span class="mr10">admin</span>
            <a href="/weixinshop/index.php?g=admin&m=index&a=logout">[注销]</a>
        </div>
    </div>
    <ul class="nav white" id="J_tmenu">
        <!--<li class="top_menu"><a href="javascript:;" data-id="0" hidefocus="true" style="outline:none;">控制台</a></li>-->
        <li class="top_menu"><a href="javascript:;" data-id="1" hidefocus="true" style="outline:none;">全局</a></li>
        <li class="top_menu"><a href="javascript:;" data-id="50" hidefocus="true" style="outline:none;">商品</a></li>
        <li class="top_menu"><a href="javascript:;" data-id="299" hidefocus="true" style="outline:none;">微信回复</a></li><li class="top_menu"><a href="javascript:;" data-id="70" hidefocus="true" style="outline:none;">用户</a></li>
        <li class="top_menu"><a href="javascript:;" data-id="10" hidefocus="true" style="outline:none;">运营</a></li><li class="top_menu"><a href="javascript:;" data-id="29" hidefocus="true" style="outline:none;">数据</a></li>
    </ul>
</div>
<div id="content">
    <div class="left_menu fl">
        <div id="J_lmenu" class="J_lmenu" data-uri="/weixinshop/index.php?g=admin&m=index&a=left"></div>
        <a href="javascript:;" id="J_lmoc" style="outline-style: none; outline-color: invert; outline-width: medium;" hidefocus="true" class="open" title="展开或关闭"></a>
    </div>
    <div class="right_main"><div class="crumbs">
            <div class="options">
                <a href="javascript:;" title="刷新页面" id="J_refresh" class="refresh" hidefocus="true">刷新页面</a>
                <a href="javascript:;" title="全屏" id="J_full_screen" class="admin_full" hidefocus="true">全屏</a>
                <a href="javascript:;" title="更新缓存" id="J_flush_cache" class="flush_cache" data-uri="/weixinshop/index.php?g=admin&m=cache&a=qclear" hidefocus="true">更新缓存</a><!--<a href="javascript:;" title="后台地图" id="J_admin_map" class="admin_map" data-uri="/weixinshop/index.php?g=admin&m=index&a=map" hidefocus="true">后台地图</a>--></div>
            <div id="J_mtab" class="mtab"><a href="javascript:;" id="J_prev" class="mtab_pre fl" title="上一页">上一页</a><a href="javascript:;" id="J_next" class="mtab_next fr" title="下一页">下一页</a><div class="mtab_p"><div class="mtab_b"><ul id="J_mtab_h" class="mtab_h"><li class="current" data-id="0"><span><a>后台首页</a></span></li></ul></div></div></div></div><div id="J_rframe" class="rframe_b">
            <iframe id="rframe_0" src="/weixinshop/index.php?g=admin&m=index&a=panel" frameborder="0" scrolling="auto" style="height:100%;width:100%;"></iframe></div></div></div><script src="/weixinshop/static/js/jquery/jquery.js"></script><script src="/weixinshop/static/js/pinphp.js"></script><script>//初始化弹窗
    (function (d) {
        d['okValue'] = lang.dialog_ok;
        d['cancelValue'] = lang.dialog_cancel;
        d['title'] = lang.dialog_title;
    })($.dialog.defaults);
</script>
<script src="./Tpl/admin/Style/js/index.js"></script>
</body>
</html>