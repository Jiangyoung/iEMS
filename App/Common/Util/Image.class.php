<?php
namespace Common\Util;

use \Common\Util\String;

class Image {

    /**
     * 生产图像验证码(直接输出图像)
     * void
     * @param int $length 位数
     * @param int $mode 字符类型（1.0-9 2.A-Za-z 3.A-Za-z0-9 4.中文 其他.A-Za-z0-9(去掉LlIiOo01)）
     * @param string $type 图像格式
     * @param int $width 图像宽
     * @param int $height 图像高
     * @param string $verifyName 验证码名称
     *
     */
    static function buildImageVerify($length=4, $mode=1, $type='png', $width=50, $height=24, $verifyName='verify'){
        $verifyCode = String::randString(4,1);
        $_SESSION[$verifyName] = md5($verifyCode);

        $img = null;
        if ($type != 'gif' && function_exists('imagecreatetruecolor')) {
            $img = imagecreatetruecolor($width, $height);
        } else {
            $img = imagecreate($width, $height);
        }
        $r = Array(225, 255, 255, 223);
        $g = Array(225, 236, 237, 255);
        $b = Array(225, 236, 166, 125);
        $key = mt_rand(0, 3);

        //背景色
        $backColor = imagecolorallocate($img, $r[$key], $g[$key], $b[$key]);
        //边框色
        $borderColor = imagecolorallocate($img, 100, 100, 100);
        imagefilledrectangle($img, 0, 0, $width - 1, $height - 1, $backColor);
        imagerectangle($img, 0, 0, $width - 1, $height - 1, $borderColor);
        $stringColor = imagecolorallocate($img, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120));
        // 干扰
        for ($i = 0; $i < 10; $i++) {
            imagearc($img, mt_rand(-10, $width), mt_rand(-10, $height), mt_rand(30, 300), mt_rand(20, 200), 55, 44, $stringColor);
        }
        for ($i = 0; $i < 25; $i++) {
            imagesetpixel($img, mt_rand(0, $width), mt_rand(0, $height), $stringColor);
        }
        for ($i = 0; $i < $length; $i++) {
            imagestring($img, 5, $i * 10 + 5, mt_rand(1, 8), $verifyCode{$i}, $stringColor);
        }
        self::output($img);
    }

    static function output($img,$type = 'png'){
        header('Content-type:image/'.$type);
        $imgFunc = 'image'.$type;
        $imgFunc($img);
        imagedestroy($img);
    }
}