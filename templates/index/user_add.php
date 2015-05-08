<form class="form-horizontal">
    <fieldset>
        <div id="legend" class="">
            <legend class="">添加用户</legend>
        </div>
        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">用户名：</label>
            <div class="controls">
                <input type="text" placeholder="这里输入用户名" class="input-xlarge">
                <p class="help-block">字母+数字</p>
            </div>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">密码：</label>
            <div class="controls">
                <input type="text" placeholder="这里输入密码密码" class="input-xlarge">
                <p class="help-block">字母+数字 建议6位以上</p>
            </div>
        </div>

        <div class="control-group">

            <!-- Search input-->
            <label class="control-label">确认密码：</label>
            <div class="controls">
                <input type="text" placeholder="再次输入密码" class="input-xlarge search-query">
                <p class="help-block">重复上面的输入</p>
            </div>

        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
                <input type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">Supporting help text</p>
            </div>
        </div>

    </fieldset>
</form>
<form>
    <input id="file_upload" name="file_upload" type="file" multiple="true">
    <input type="hidden" name="photo_path" value=""/>
    <img src="" id="photoThumb" class="thumbnail" style="width: 200px; height: 200px;"/>
</form>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'buttonText':'上传图片',
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