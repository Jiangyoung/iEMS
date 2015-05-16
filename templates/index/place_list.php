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
        <th>#</th><th>实验室位置</th><th>实验室名称</th><th>负责管理员</th><th>备注</th><th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($list as $k => $v){ ?>
        <tr>
            <td><?php echo $k+1; ?></td>
            <td><?php echo $v['locationText']; ?></td>
            <td><?php echo $v['name']; ?></td>
            <td><?php
                $tpl = '<a href="javascript:void(0);" data-value="%s">%s</a>&nbsp;';
                foreach($v['adminTexts'] as $id => $admin){
                    echo sprintf($tpl,$id,$admin);
                }
                ?>
            </td>
            <td><?php echo $v['remark']; ?></td>
            <td><a href="#">修改</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php echo $pageNav; ?>
<?php $this->load('widget/footer.php'); ?>
</body>
</html>