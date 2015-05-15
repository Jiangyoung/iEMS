<!DOCTYPE html>
<html>
<head>
    <?php $this->load('widget/header.php'); ?>
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
            <div class="input-group-addon">设备名称：<span class="text-danger">*</span></div>
            <input type="text" class="form-control" name="name" value="<?php echo $postData['name']; ?>" placeholder="设备名称">
        </div><br/><br/>
        <div class="input-group">
            <div class="input-group-addon">设备类型：</div>
            <select name="type" class="form-control">
                <?php
                $typeTpl = '<option value="%s">%s</option>';
                foreach($postData['typeTexts'] as $key => $type){
                    echo sprintf($typeTpl,$key,$type);
                }
                ?>
            </select>
        </div><br/><br/>
        <div class="input-group">
            <div class="input-group-addon">型号：<span class="text-danger">*</span></div>
            <input type="text" class="form-control" name="model" value="<?php echo $postData['model']; ?>" placeholder="设备型号">
        </div><br/><br/>
        <div class="input-group">
            <div class="input-group-addon">描述：<span class="text-danger">*</span></div>
            <textarea name="description" rows="3" placeholder="设备描述"><?php echo $postData['description']; ?></textarea>
        </div><br/><br/>
        <div class="input-group">
            <div class="input-group-addon">备注：</div>
            <textarea name="remark" rows="3" placeholder="备注"><?php echo $postData['remark']; ?></textarea>
        </div><br/><br/>
    </div>
    <div class="right">
        <img src="" id="photoThumb" class="thumbnail" style="width: 200px; height: 200px;"/>
        <input id="file_upload" name="file_upload" type="file" multiple="true">
        <input type="hidden" name="photo_path" value="<?php echo $postData['photo_path']; ?>"/>
        <input type="hidden" name="_token" value="<?php echo $_token; ?>"
        <div id="queue"></div>
    </div><br/>


    <div class="submit">
        <input type="submit" class="btn btn-primary" value="保&nbsp;&nbsp;&nbsp;存">
    </div>
</form>
<?php $this->load('widget/footer.php'); ?>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {

        $("input[name='username']").on('keyup',function(){
            var username = $(this).val();
            $("input[name='nickname']").val(username);
        });

        var clearErrMsg = function(){
            $("#errMsg").text("");
        };
        setTimeout(clearErrMsg,8000);

        $('#file_upload').uploadify({
            'buttonText':'上传设备图片',
            'fileTypeExts':"*.jpg;*.jpeg;*.png;*.gif;*.bmp",
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('ix@u&*^&Nmnm' . $timestamp);?>'
            },
            'swf'      : 'uploadify/uploadify.swf',
            'uploader' : 'imageupload.php',
            'onUploadSuccess' : function(file, data, response) {
                var ret = $.parseJSON(data);
                if(0 == ret.errno){
                    $("#photoThumb").attr("src",ret.data);
                    $("input:hidden[name=photo_path]").val(ret.data);
                }else{
                    alert("Error:"+ret.message);
                }

            }
        });
    });
</script>
</body>
</html>