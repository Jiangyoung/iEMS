<!-- Bootstrap core JavaScript================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $this->getFileUrl('static/jquery-1.11.2/jquery.min.js'); ?>"></script>
<script src="<?php echo $this->getFileUrl('static/bootstrap-3.3.4-dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo $this->getFileUrl('uploadify/jquery.uploadify.min.js'); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(function() {
        $("a[data-href]").click(function(){
            var url = $(this).attr("data-href");
            $.get(url,function(data,status){
                $("#iframe_main").html(data);
            });
        });
    });
</script>
