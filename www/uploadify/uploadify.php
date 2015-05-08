<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = 'uploads'; // Relative to the root

$verifyToken = md5('ix@u&*^&Nmnm' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT']. '/' .dirname($_SERVER['PHP_SELF']). '/' . $targetFolder;
	$targetName = date('Y-m-d').'/'.mt_rand(10000,20000).time();

	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array($fileParts['extension'],$fileTypes)) {
		$targetName .= '.' . $fileParts['extension'];
		$targetFile = rtrim($targetPath,'/') . '/' . $targetName;
		$dir = dirname($targetFile);
		if(!is_dir($dir)){
			mkdir($dir,0777,true);
		}
		move_uploaded_file($tempFile,$targetFile);
		echo $targetName;
	} else {
		echo 'Invalid file type.';
	}
}
