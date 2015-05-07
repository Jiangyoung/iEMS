<!Doctype html>
<html>
    <head>
        <?php $this->load('widget/header.php'); ?>
        <title><?php echo $title; ?></title>
    </head>
<body>
    <div >
        <p>key1:<?php echo $key1; ?></p>
        <p>key2:<?php echo $key2; ?></p>
        <p><?php echo $controller; ?></p>
        <p><?php echo $action; ?></p>
        <p><?php echo $this->getFileUrl('image/1.png'); ?></p>
    </div>
    <?php $this->load('widget/footer.php'); ?>
</body>
</html>
