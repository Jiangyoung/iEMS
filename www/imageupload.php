<?php

// Define a destination
$targetFolder = 'static/images/uploads'; // Relative to the root

$verifyToken = md5('ix@u&*^&Nmnm' . $_POST['timestamp']);

function response($errno,$message,$data=''){
    echo json_encode(array('errno'=>$errno,'message'=>$message,'data'=>$data));
}

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    $tempFile = $_FILES['Filedata']['tmp_name'];

    $photoPath = $targetFolder. '/' . date('Y-m-d');
    $photoName = mt_rand(10000,20000).time();

        // Validate the file type
    $fileTypes = array('jpg','jpeg','gif','png','bmp'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);
    $fileType = strtolower($fileParts['extension']);
    if (in_array($fileType,$fileTypes)) {
        $photoName .= '.' . $fileType;
        $targetFile = $photoPath . '/' . $photoName;

        $dir = dirname($targetFile);
        if(!is_dir($dir)){
            mkdir($dir,0777,true);
        }
        move_uploaded_file($tempFile,$targetFile);

        //TODO 这里处理图像 缩略图什么的处理
        require_once "Image.class.php";
        $thumbFileName = str_replace('.'.$fileType,'t.'.$fileType,$targetFile);
        $thumbFile = Image::thumb($targetFile,$thumbFileName,$fileType,800,600,true);
        //删除原图
        @unlink($targetFile);


        response(0,'Success!',$thumbFile);
    } else {
        response(1,'Invalid file type.');
    }
}else{
    response(1,'Empty FILE or token verify failed.');
}