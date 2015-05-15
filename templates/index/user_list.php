<!DOCTYPE html>
<html>
<head>
    <?php $this->load('widget/header.php'); ?>
</head>
<body class="container">
<div class="page-header">
    <h1><?php echo $actionName?></h1>
</div>
<table class="table table-hover">
    <thead>
    <tr>
        <th>#</th><th>用户名</th><th>昵称</th><th>手机号</th><th>邮箱</th><th>头像</th><th>备注</th><th>类型</th><th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($list as $k => $v){ ?>
    <tr>
        <td><?php echo $k+1; ?></td>
        <td><?php echo $v['username']; ?></td>
        <td><?php echo $v['nickname']; ?></td>
        <td><?php echo $v['phone']; ?></td>
        <td><?php echo $v['email']; ?></td>
        <td><img src="<?php echo $this->getFileUrl($v['photo_path']); ?>" class="thumbnail" style="width:80px;" /></td>
        <td><?php echo $v['remark']; ?></td>
        <td><?php echo $v['typeText']; ?></td>
        <td><a href="#">修改</a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>

<?php echo $pageNav; ?>
<?php $this->load('widget/footer.php'); ?>
</body>
</html>