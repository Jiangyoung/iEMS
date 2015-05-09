
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $this->getFileUrl('static/images/logo.jpg'); ?>">

    <title><?php echo $title; ?></title>

    <?php $this->load('widget/header.php'); ?>

    <link href="<?php echo $this->getFileUrl('static/css/index/dashboard.css'); ?>" rel="stylesheet">

    <link href="<?php echo $this->getFileUrl('static/css/index/index.css'); ?>">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">设备管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">About</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active nav-tag">信息管理 <span class="sr-only">(current)</span></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=index&a=list">概况管理</a></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=index&a=query">查询管理</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li class="active nav-tag">用户管理 <span class="sr-only">(current)</span></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=user&a=add">添加用户</a></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=user&a=list">用户管理</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li class="active nav-tag">设备管理 <span class="sr-only">(current)</span></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=equipment&a=add">添加设备</a></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=equipment&a=info">设备信息管理</a></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=equipment&a=list">设备管理</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li class="active nav-tag">设备维护管理 <span class="sr-only">(current)</span></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=maintain&a=add">添加设备维护</a></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=maintain&a=list">维护信息统计</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li class="active ">设备借还管理 <span class="sr-only">(current)</span></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=circulate&a=add">添加设备借还</a></li>
                <li><a href="javascript:void(0);" data-href="index.php?c=circulate&a=list">设备借还管理</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="iframe_main">
            <script>

            </script>
        </div>
    </div>
</div>

<?php $this->load('widget/footer.php'); ?>
</body>
</html>
