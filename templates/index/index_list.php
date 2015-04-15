<!Doctype html>
<html>
    <head>
        <?php $this->load('widget/header.php'); ?>
    </head>
<body>
    <div >
        <p>key1:<?php echo $this->key1 ?></p>
        <p>key2:<?php echo $this->key2 ?></p>
        <p><?php echo $this->controller ?></p>
        <p><?php echo $this->action ?></p>
        <p><?php echo $this->getFileUrl('image/1.png'); ?></p>
    </div>
</body>
</html>
