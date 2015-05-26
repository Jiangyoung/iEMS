<!DOCTYPE html>
<html>
<head>
    <?php $this->load('widget/header.php'); ?>
    <link rel="stylesheet" href="<?php echo $this->getFileUrl('static/chosen_v1.4.2/chosen.min.css'); ?>" />
</head>
<body class="container">
<div class="page-header">
    <h1><?php echo $actionName?></h1>
</div>

<form action="" method="post">
    <div id="errMsg">
        <?php
        $errMsgTpl = '<p class="bg-danger">%s</p>';
        foreach($errMsg as $e){
            echo sprintf($errMsgTpl,$e);
        }
        ?>
    </div>
    <div class="form-inline left">
        <div class="input-group">
            <div class="input-group-addon">实验室：</div>
             <p><?php echo $postData['placeText']; ?></p>
        </div><br/><br/>
        <div class="input-group">
            <div class="input-group-addon">选择设备：</div>
            <select name="p_ids[]" required="true" data-placeholder="选择设备" style="width:190px;" multiple="true" class="form-control chosen-select">
                <?php $p_idTpl = '<option value="%d" %s>%s</option>';
                foreach($postData['p_idTexts'] as $k => $v){
                    $selected='';
                    if($postData['location'] == $k)$selected='selected';
                    echo sprintf($p_idTpl,$k,$selected,$v);
                }
                ?>
            </select>&nbsp;&nbsp;<a href="index.php?c=user&a=add">添加管理员</a>
        </div><br/><br/>

        <div class="input-group">
            <div class="input-group-addon">备注：</div>
            <textarea rows="3" class="form-control" name="remark" value="" placeholder="备注"><?php echo $postData['remark']; ?></textarea>
        </div><br/><br/>
    </div>

    <div class="submit">
        <input type="hidden" name="_token" value="<?php echo $_token; ?>" />
        <input type="submit" class="btn btn-primary" value="保&nbsp;&nbsp;&nbsp;存" />
    </div>
</form>
<?php $this->load('widget/footer.php'); ?>
<script type="text/javascript" src="<?php echo $this->getFileUrl('static/chosen_v1.4.2/chosen.jquery.min.js'); ?>" ></script>
<script type="text/javascript">

    $(function() {
        $(".chosen-select").chosen({max_selected_options: 3});
        var clearErrMsg = function(){
            $("#errMsg").text("");
        };
        setTimeout(clearErrMsg,8000);


    });
</script>
</body>
</html>